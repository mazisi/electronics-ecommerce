<?php

namespace App\Http\Livewire\Store;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewProduct extends Component
{
    public $product;
    public $quantity = 1;
 
    protected $queryString = ['product'];

    public function increamentQuantity()
    {
        return $this->quantity++;
    }

    public function decrementQuantity(){
        
        if($this->quantity <= 1){
            return;
        }
        return $this->quantity--;
    }

    //Add to cart request
    public function addToCart()
    {
        $this->validate([
            'quantity' => 'required|numeric|min:1'
        ]);
        try {

            $exist = Cart::where('product_id',$this->product)
                            ->where('cookie',$_COOKIE['user'])
                            ->first();
            if($exist){
                session()->flash('error','Product alredy added to cart.');
                return back();
            }
            $model = Cart::create([
                'product_id' => $this->product,
                'quantity' => $this->quantity,
                'cookie' => $_COOKIE['user'],
                'status' => 'recent'
            ]);
            if($model){
                $this->emit('refresh-cart-counter');
                session()->flash('success','Product added to cart.');
                return back();
            }
            session()->flash('error','Product added to cart.');
                return back();
        } catch (\Throwable $th) {
            return view('_500_');
        }
    }

    public function render() {
        $viewProduct = Product::where('id', 'like', '%'.$this->product.'%')->firstOr(function(){
            return view('_404_');
        });
        
        return view('livewire.store.view-product',[
            'viewProduct' => $viewProduct]);
    }
}
