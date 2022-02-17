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

class DNS implements ShouldQueue
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
            $dns = dns_get_record(parse_url($thirdParty->base_url, PHP_URL_HOST), DNS_TXT);

            foreach ($dns as $record) {
                if (str_contains($record['txt'], "hsuan-site-verification")) {
                    if (str_contains($record['txt'], $this->validation->validate_string)) {
                        $thirdParty->update([
                            'verified' => true,
                            'validated_at' => now()
                        ]);
                        $this->user->notify(new ThirdPartyValidationNotification($thirdParty));
                        break;
                    } else {
                        $this->user->notify(new ThirdPartyValidationNotification($thirdParty, [
                            'title' => '錯誤： 驗證失敗',
                            'message' => "你的網站「{$thirdParty->description}」的驗證碼錯誤",
                            'type' => 'error'
                        ]));
                        break;
                    }
                }
            }
        } catch (\Exception $e) {
            $msg = $e->getMessage();
            $this->user->notify(new ThirdPartyValidationNotification($thirdParty, [
                'title' => '錯誤： 驗證失敗',
                'message' => "在驗證你的網站「{$thirdParty->description}」時發生錯誤： {$msg}",
                'type' => 'error'
            ]));
        }
    }
}
