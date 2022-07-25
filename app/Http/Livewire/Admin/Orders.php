<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Orders extends Component
{
    public function render(){
        $orders = User::whereNull('is_admin')->where('status','1')->get(['id','full_name','email','mobile','city','cookie','created_at']);
        return view('livewire.admin.orders',['orders' => $orders]);
    }
}
