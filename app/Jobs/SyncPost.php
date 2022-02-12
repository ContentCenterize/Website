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

class SyncPost implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $thirdParty;

    public function __construct(ThirdParty $thirdParty)
    {
        $this->thirdParty = $thirdParty;
    }

    public function handle()
    {
        $tp = $this->thirdParty;

        # Step1: Check robots.txt
        $robots = new RobotsTxtParser(Http::get($tp->base_url . '/robots.txt')->body());
        $robots_validator = new RobotsTxtValidator($robots->getRules());

        if ($robots_validator->isUrlAllow('/', 'bot')) {
            return Auth::user()->notify(new ThirdPartySyncNotification($tp, [
                'title' => '錯誤： 同步失敗',
                'message' => "你的網站「{$tp->description}」必須關閉搜尋引擎索引 {$tp->base_url}",
                'type' => 'error'
            ]));
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
                    'content' => $data['content']['$t'],
                    'post_id_in_thirdparty' => $data['id']['$t']
                ]);
            } else {
                $post->update([
                    'title' => $data['title']['$t'],
                    'content' => $data['content']['$t']
                ]);
            }
        }

        Auth::user()->notify(new ThirdPartySyncNotification($tp));
    }

    public $uniqueFor = 3600;

    public function uniqueId()
    {
        return $this->thirdParty->id;
    }
}
