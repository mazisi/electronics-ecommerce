<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cart;
use App\Models\User;
use Livewire\Component;

class ViewOrder extends Component
{

    public $user;

    public User $userData;
 
    protected $queryString = ['user'];

    public function mount(){
        try {

            $this->userData = User::where('cookie',$this->user)->first();
            if ($this->userData ->status == '1') {
                $this->userData->update(['status' => 2]);
            }            
            
        } catch (\Throwable $th) {
            return view('_404_');
        }
        
    }

    public function render() {
        $orders = Cart::with('product')->where('cookie',$this->user)->get();
        return view('livewire.admin.view-order',['orders' => $orders]);
    }
}
