<?php

namespace App\Http\Livewire\Store;

use App\Models\Cart;
use App\Models\User;
use Livewire\Component;
use App\Models\Notification;
use App\Http\Traits\HasCookie;

class Carts extends Component
{
    public $quantity;
    public $customer_name = null;
    public $customer_email = null;
    public $customer_phone = null;
    public $customer_address = null;
    public $customer_city = null;
    public $postal_code = null;

    protected $rules = [
        'customer_name' => 'required|string|min:10|max:200',
        'customer_email' => 'required|email|unique:users,email',
        'customer_phone' => 'required',
        'customer_address' => 'required',
        'customer_city' => 'required|string',
        'postal_code' => 'required|numeric'
    ];

    public function getQuantity($cart_id){
        $cart = Cart::find($cart_id);
        $this->quantity = $cart->quantity;
        return $this->quantity;
    }


    public function updateCart($cart_id)
    {
        try {dd($this->quantity);
            // $this->validate(['quantity' => 'required|numeric|min:1']);
            $update = Cart::whereId($cart_id)->update(['quantity' => $this->quantity]);
            if($update){
                session()->flash('success','Cart updated successfully.');
                return back();
            }
            session()->flash('error','An unknown error occured.');
            return back();

        } catch (Throwable $th) {
            return view('_500_');
        }
    }
    
    public function removeFromCart($cart_id){

        try {
            $del = Cart::whereId($cart_id)->where('cookie',$_COOKIE['user'])->first();
            if($del->delete()){
                $this->emit('refresh-cart-counter');
                session()->flash('success','Item removed successfully.');
                return back();
            }
            session()->flash('error','An unknown error occured.');
            return back();

        } catch (Throwable $th) {
            return view('_500_');
        }
        
    }

    // public function updatedQuantity(){
    //    $del = Cart::whereId($cart_id)->where('cookie',$_COOKIE['user'])->first();
            
        
    // }

    public function placeOrder(){
        try {
            $this->validate();
            if(isset($_COOKIE['user'])) {
                $insert = User::create([
                    'full_name' => $this->customer_name,
                    'email' => $this->customer_email,
                    'mobile' => $this->customer_phone,
                    'address' => $this->customer_address,
                    'city' => $this->customer_city,
                    'postal_code' => $this->postal_code,
                    'cookie' => $_COOKIE['user']
                ]);

                if($insert){
                    Notification::create([
                        'model_type' => 'App\Models\Order',
                        'model_id'=> $insert->id,
                        'status' => '0',
                        'cookie' => $_COOKIE['user'],
                        'body' => $insert->full_name.' placed an order.'
                    ]);
                    $this->emit('refresh-notification-counter');
                    // unset($_COOKIE['user']);
                    session()->flash('success','Order Place successfully.');
                    $this->reset();
                    return back();
                }
                session()->flash('error','An unknown error occured.');
                return back();
            }

        } catch (Throwable $th) {
            return view('_500_');
        }
        
    }
    public function render(){ 
          HasCookie::setCartCookie();
          $cartProducts = Cart::with('product')->where('cookie',$_COOKIE['user'])->get(['id','quantity','product_id']);
          return view('livewire.store.carts',['cartProducts' => $cartProducts]);
    }
}
