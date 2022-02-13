<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\ThirdParty;
use App\Notifications\ThirdPartySyncNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Log;
use RobotsTxtParser\RobotsTxtParser;
use RobotsTxtParser\RobotsTxtValidator;

class SyncPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $thirdParty;
    protected $user;

    public function __construct(ThirdParty $thirdParty)
    {
        $this->thirdParty = $thirdParty;
        $this->user = Auth::user();
    }

    public function handle()
    {
        Log::debug('開始');
        $tp = $this->thirdParty;

        # Step1: Check robots.txt
        $robots = new RobotsTxtParser(Http::get($tp->base_url . '/robots.txt')->body());
        $robots_validator = new RobotsTxtValidator($robots->getRules());

        if ($robots_validator->isUrlAllow('/', 'bot') && $this->user->cannot('override_robots')) {
            $this->user->notify(new ThirdPartySyncNotification($tp, [
                'title' => '錯誤： 同步失敗',
                'message' => "你的網站「{$tp->description}」必須關閉搜尋引擎索引 {$tp->base_url}",
                'type' => 'error'
            ]));
            return;
        }

        $response = Http::get($tp->base_url . Config::get("thirdparty.all.{$tp->type}.feed"));
        $tp->update([
            'updated' => $response['feed']['updated']['$t']
        ]);
        foreach ($response['feed']['entry'] as $data) {
            $post = $tp->posts()->where('post_id_in_thirdparty', $data['id']['$t'])->first();
            if (is_null($post)) {
                $tp->posts()->create([
                    'title' => $data['title']['$t'],
                    'content' => replace_code_to_block($data['content']['$t']),
                    'post_id_in_thirdparty' => $data['id']['$t']
                ]);
            } else {
                $post->update([
                    'title' => $data['title']['$t'],
                    'content' => replace_code_to_block($data['content']['$t'])
                ]);
            }
        }

        $this->user->notify(new ThirdPartySyncNotification($tp));
    }

}
