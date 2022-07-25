<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Http\Traits\HasCookie;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function productDetails(){
        
        try {
            HasCookie::setCartCookie();
            $viewProduct = Product::where('id',request('product'))->first();

            $relatedProducts = Product::where('category_id',$viewProduct->category_id)
                                    ->whereNotNull('category_id')
                                    ->where('id','!=',$viewProduct->id)->get();
        } catch (\Throwable $th) {
            return view('_404_');
        }
        return view('store.view-product',['viewProduct' => $viewProduct, 'relatedProducts' => $relatedProducts]);
    }


    public function show()
    {
        return view('admin.view-product');
    }
}
