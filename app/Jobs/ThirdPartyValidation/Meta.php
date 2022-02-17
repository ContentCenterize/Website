<?php

namespace App\Jobs\ThirdPartyValidation;

use App\Models\ThirdPartyValidation;
use App\Notifications\ThirdPartyValidationNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class Meta implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected ThirdPartyValidation $validation;
    protected $user;

    public function __construct($thirdPartyValidation)
    {
        $this->validation = $thirdPartyValidation;
        $this->user = Auth::user();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $thirdParty = $this->validation->third_party;
        try {
            $tags = get_meta_tags($thirdParty->base_url);
            if ($tags['hsuan-site-verification'] == $this->validation->validate_string) {
                $thirdParty->update([
                    'verified' => true,
                    'validated_at' => now()
                ]);
                $this->user->notify(new ThirdPartyValidationNotification($thirdParty));
            } else {
                $this->user->notify(new ThirdPartyValidationNotification($thirdParty, [
                    'title' => '錯誤： 驗證失敗',
                    'message' => "你的網站「{$thirdParty->description}」的驗證碼錯誤",
                    'type' => 'error'
                ]));
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            if (str_contains($msg, '404')) {
                $msg = '找不到驗證檔案';
            }
            $this->user->notify(new ThirdPartyValidationNotification($thirdParty, [
                'title' => '錯誤： 驗證失敗',
                'message' => "在驗證你的網站「{$thirdParty->description}」時發生錯誤： {$msg}",
                'type' => 'error'
            ]));
        }
    }
}
