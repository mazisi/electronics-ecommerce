<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductImage;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class ViewProduct extends Component
{
    use WithFileUploads;
    public $product;
    public Product $getProduct;
    public $image = null;
 
    protected $queryString = ['product'];
    protected $listeners = ['refresh-product-image' => 'mount'];

    protected $rules = [
        'getProduct.name' => 'required',
        'getProduct.price' => 'required',
        'getProduct.discount_price' => '',
        'getProduct.description' => '',
        'getProduct.packsize' => 'required',
        'getProduct.visibility' => ''
    ];

    public function mount() { 
           $this->getProduct = Product::whereId($this->product)->firstOr(function(){
              return view('admin._404');
           });
    }

    public function update(){
        $product_image = null;
        if(!is_null($this->image)){
            $this->validate(['image' => 'image|max:2048']);
            $product_image = $this->image->store('products','public');
            $image = Image::make("storage/{$product_image}")->fit(1020,670);
            $image->save();
        } 
        Product::whereId($this->getProduct->id)->update([
            'name'=> $this->getProduct->name,
            'price'=> $this->getProduct->price,
            'discount_price'=> $this->getProduct->discount_price,
            'description'=> $this->getProduct->description,
            'packsize'=> $this->getProduct->packsize,
            'visibility'=> $this->getProduct->visibility,
            'image'=> $product_image
        ]);
        session()->flash('success',''.$this->getProduct->name.' Product updated successfully.');
        $this->emit('refresh-product-image');
        return back();
    }

    public function render()
    {
        return view('livewire.product.view-product');
    }
}
