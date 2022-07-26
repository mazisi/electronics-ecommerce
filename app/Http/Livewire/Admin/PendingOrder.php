<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Http\Traits\UpdatableOrderStatus;
use Livewire\WithPagination;

class PendingOrder extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updateOrderStatus($status,$order_id){
        UpdatableOrderStatus::updateStatus($status, $order_id);
        session()->flash('success','Order status updated successfully.');
        return back();
    }


    public function render(){
        $orders = User::whereNull('is_admin')->where('status','2')->paginate(9);
        return view('livewire.admin.pending-order',['orders' => $orders]);
    }
}
