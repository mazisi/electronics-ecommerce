<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;


class Products extends Component
{
    use WithFileUploads, WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $excel_document = null;
    public $is_document_header = null;
    public $category_id = null;

    public function store(){
        $this->validate([
            "excel_document" => "required|file"
           ]);

          $excel_document = $this->excel_document->store('excel','public');
          $valid_extension = array("csv");
          $extension = $this->excel_document->getClientOriginalExtension();
   
          if(in_array(strtolower($extension),$valid_extension)){
               if (($handle = fopen ( public_path () . '/storage/'.$excel_document, 'r' )) !== FALSE) {
                   $flag = true;
               
                   while ( ($data = fgetcsv ( $handle, 1000, ',' )) !== FALSE ) {
                     if($this->is_document_header == '1'){
                       if($flag) { 
                           $flag = false; continue;
                        }
                       }
                       $csv_data = new Product();
                       $csv_data->name = $data [0];
                       $csv_data->price = $data [1];
                       $csv_data->packsize = $data [2];
                       $csv_data->description = $data [3];
                       $csv_data->category_id = $this->category_id;
                       $csv_data->save();
                   }
               
                   fclose ( $handle );
                   unlink(public_path('storage/'.$excel_document));
                   return back();
               }else{
                return back();
               }
           }else{
               return back();
             }
     
    }
    

    public function render(){
        $categories = Category::get(['id','name']);
        $products = Product::with('category')->latest()->paginate(6);
        return view('livewire.product.products',['categories' => $categories, 'products' => $products]);
    }

    
    public function destroy($id){
        $product = Product::whereId($id)->firstOr(function(){
            return view('admin._404');
        });
        if($product->delete()){
            return back();
            session()->flash('success','Product deleted successfully.');
        }
        return back();
            session()->flash('error','Error deleting product.');
    }
}
