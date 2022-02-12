<?php

namespace App\Http\Livewire\Notification;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Panel extends Component
{
    public $panelOpen = false;
    public $notifications  = [];
    public $currentURL;
    public function render()
    {
        return view('livewire.notification.panel');
    }

    public function mount()
    {
        $this->notifications = Auth::user()->unreadNotifications;
        $this->currentURL = url()->current();
    }

    public function togglePanel(){
        $this->panelOpen = !$this->panelOpen;
    }

    public function readNotification($id){
        $user = Auth::user();
        $notification = $user->notifications()->find($id)->first();
        //dd($notification);
        $notification->markAsRead();
        return Redirect::to($this->currentURL);
    }
}
