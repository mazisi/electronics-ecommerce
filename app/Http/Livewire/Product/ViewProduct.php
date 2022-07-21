<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewProduct extends Component
{
    use WithFileUploads;
    public $product;
    public Product $getProduct;
    public $images = [];
 
    protected $queryString = ['product'];
    protected $listeners = ['refresh-product-images' => 'mount'];

    protected $rules = [
        'getProduct.name' => 'required',
        'getProduct.price' => 'required',
        'getProduct.discount_price' => '',
        'getProduct.description' => '',
        'getProduct.packsize' => 'required',
        'getProduct.visibility' => ''
    ];

    public function mount() { 
           $this->getProduct = Product::with('product_images')->whereId($this->product)->firstOr(function(){
              return view('admin._404');
           });
    }

    public function update(){
        Product::whereId($this->getProduct->id)->update([
            'name'=> $this->getProduct->name,
            'price'=> $this->getProduct->price,
            'discount_price'=> $this->getProduct->discount_price,
            'description'=> $this->getProduct->description,
            'packsize'=> $this->getProduct->packsize,
            'visibility'=> $this->getProduct->visibility
        ]);

        if(!empty($this->images)){
            $this->validate(['images*' => 'image|max:4']);
            foreach ($this->images as $img) {
                $image = $img->store('products','public');
                ProductImage::create([
                    'product_id' => $this->getProduct->id,
                    'image' => $image
                ]);
            }
        } 
        $this->emit('refresh-product-images');
    }

    public function render()
    {
        return view('livewire.product.view-product');
    }
}
