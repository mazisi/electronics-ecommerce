<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Http\Traits\UpdatableOrderStatus;

class PendingOrder extends Component
{

    public function updateOrderStatus($status,$order_id){
        UpdatableOrderStatus::updateStatus($status, $order_id);
        session()->flash('success','Order status updated succesfully.');
        return back();
    }


    public function render(){
        $orders = User::whereNull('is_admin')->where('status','2')->get(['id','full_name','email','mobile','city','cookie','created_at']);
        return view('livewire.admin.pending-order',['orders' => $orders]);
    }
}
