<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['refresh-cart-counter' => 'render'];
    
    public function removeFromCart($cart_id){
        try {
            $del = Cart::whereId($cart_id)->where('cookie',$_COOKIE['user'])->first();
            if($del->delete()){
                session()->flash('success','Item removed successfully.');
                return back();
            }
            session()->flash('error','An unknown error occured.');
            return back();

        } catch (\Throwable $th) {
            return view('_500_');
        }
        
    }

    public function render(){
        $cartItems = Cart::with('product')->where('cookie',$_COOKIE['user'])->take(3)->latest()->get(['id','product_id']);
        
        return view('livewire.cart-counter',['cartItems' => $cartItems,'cart_total' => 0]);
    }
}
