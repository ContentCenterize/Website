<?php

namespace App\Notifications;

use App\Models\ThirdParty;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ThirdPartySyncNotification extends Notification
{
    use Queueable;
    public $thirdParty;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ThirdParty $thirdParty)
    {
        $this->thirdParty = $thirdParty;
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
        return [
            'title' => "Synced Third Party",
            'message' => "Synced {$this->thirdParty->name}",
            'type' => 'success',
        ];
    }
}
