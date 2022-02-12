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
        $response = Http::get($tp->base_url.Config::get("thirdparty.all.{$tp->type}.feed"));
        $tp->update([
           'updated' => $response['feed']['updated']['$t']
        ]);
        foreach($response['feed']['entry'] as $data){
            $post = $tp->posts()->where('post_id_in_thirdparty', $data['id']['$t'])->first();
            if(is_null($post)){
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
