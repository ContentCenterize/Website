<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\ThirdParty;
use App\Notifications\ThirdPartySyncNotification;
use DfaFilter\SensitiveHelper;
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
use Laminas\Feed\Reader\Reader;

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

        # UPD 2022 02 14 RSS Feed
        $feed_res = Http::get($tp->base_url . Config::get("thirdparty.all.{$tp->type}.feed"));
        $feed = Reader::importString($feed_res->body());
        $tp->update([
            'updated' => $feed->getLastBuildDate()
        ]);
        $sensitive = false;
        foreach ($feed as $item) {
            $post = $tp->posts()->where('post_id_in_thirdparty', $item->getId())->first();
            if (is_null($post)) {
                $post = $tp->posts()->create([
                    'title' => $item->getTitle(),
                    'content' => make_blog_content($item->getDescription()),
                    'post_id_in_thirdparty' => $item->getId()
                ]);
            } else {
                $post->update([
                    'title' => $item->getTitle(),
                    'content' => make_blog_content($item->getDescription())
                ]);
            }
            if (has_sensitive($item->getDescription())) {
                $sensitive = true;
                $post->update([
                    'hide' => true
                ]);
            }
        }

        if ($sensitive) {
            $this->user->notify(new ThirdPartySyncNotification($tp, [
                'title' => '同步成功，但有需注意事項',
                'message' => "您的網站內容需合法合規",
                'type' => 'warning'
            ]));
        } else {
            $this->user->notify(new ThirdPartySyncNotification($tp));
        }
    }

}
