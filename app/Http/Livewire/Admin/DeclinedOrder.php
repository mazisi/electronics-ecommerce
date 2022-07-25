<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class DeclinedOrder extends Component
{
    public function render()
    {
        $orders = User::whereNull('is_admin')->where('status','4')->get(['id','full_name','email','mobile','city','cookie','created_at']);

        return view('livewire.admin.declined-order',['orders' => $orders]);
    }
}
