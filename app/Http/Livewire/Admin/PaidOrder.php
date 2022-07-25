<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class PaidOrder extends Component
{
    public function render()
    {
        $orders = User::whereNull('is_admin')->where('status','3')->get(['id','full_name','email','mobile','city','cookie','created_at']);
        return view('livewire.admin.paid-order',['orders' => $orders]);
    }
}
