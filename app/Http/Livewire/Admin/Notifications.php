<?php

namespace App\Http\Livewire\Admin;

use App\Models\Notification;
use Livewire\Component;

class Notifications extends Component
{

    protected $listeners = ['refresh-notification-counter' => 'render'];

    public function updateNotificationStatus($notification_id){
        $notification = Notification::whereId($notification_id)->first();
        $notification->update(['status' => '1']);
        return to_route('view_order',['user' => $notification->cookie]);
    }

    public function render(){
        $notifications = Notification::where('status','0')->latest()->get();
        return view('livewire.admin.notifications',['notifications' => $notifications]);
    }
}
