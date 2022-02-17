<?php

namespace App\Notifications;

use App\Models\ThirdParty;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ThirdPartyValidationNotification extends Notification
{
    use Queueable;
    public $thirdParty;
    public $arrayArgs;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ThirdParty $thirdParty, $arrayArgs = [])
    {
        $this->thirdParty = $thirdParty;
        $this->arrayArgs = $arrayArgs;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return array_merge([
            'title' => "驗證成功",
            'message' => "你的網站「{$this->thirdParty->description}」驗證成功",
            'type' => 'success',
        ], $this->arrayArgs);
    }
}
