<?php

namespace App\Http\Livewire\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;

class Index extends Component
{
    use WithFileUploads;

    public $brandLogo = null;
    public $brandUrl = null;
    public $brandName = null;

    public function store()
    {
        $this->validate([
            'brandName' => 'required|string|max:255',
            'brandLogo' => 'required|image|max:2048',
            'brandUrl' => 'required|url'
        ]);

        $logo = $this->brandLogo->store('brands','public');
        $image = Image::make("storage/{$logo}")->fit(1068,720);
        $image->save();

        $store = Brand::create([
            'name' => $this->brandName,
            'url' => $this->brandUrl,
            'logo' => $logo
        ]);
        if($store){
            session()->flash('success','Brand created successfully.');
            $this->reset();
            $this->dispatchBrowserEvent('closeModal'); 
            return back();
        }
        session()->flash('error','Error creating brand.');
        return back();
    }

    public function render()
    {
        $brands  = Brand::latest()->get(['url','logo','id']);
        return view('livewire.brands.index',['brands' => $brands]);
    }

    public function destroy($id){

        try{
            $model = Brand::whereId($id)->firstOr(function(){
                return url('/page-not-found');
            });
            if($model->delete()){
                session()->flash('success','Brand deleted successfully.');
                return back();
            }
        }catch(Exception $e){
          return view('admin.error');
        }

    }
}
