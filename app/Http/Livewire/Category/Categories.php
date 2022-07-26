<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public $name = null;
    public $edit_category;
    public $getCategoryName;
    public $show_edit_input = false;
    public $editname = null;
    public $slug = null;
    protected $paginationTheme = 'bootstrap';

    public function store(){
        $this->validate(['name' => 'required|string|max:255|unique:categories,name']);

        $category = Category::create(['name' => $this->name, 'slug' => $this->name.sha1(time())]);
        if($category){
            $this->dispatchBrowserEvent('closeModal'); 
            $this->reset("name");
            session()->flash("success","Category created successfully");
        }
        session()->flash("success","Error creating category");
    }

    public function edit($slug){
        $this->getCategoryName = Category::whereSlug($slug)->first();
        $this->editname = $this->getCategoryName->name;
        $this->show_edit_input = true;
        $this->slug = $this->getCategoryName->slug;
        
    }

    public function update(){

        try {
            Category::whereSlug($this->slug)->update(['name' => $this->editname]);
            $this->show_edit_input = false;
            $this->dispatchBrowserEvent('closeModal'); 
            session()->flash("success","Category created successfully");
        } catch (Exception $e) {
            return view('admin.error');
        }

    }

    public function render(){
        $categories = Category::with('products')->latest()->paginate(9);
        $i = 0;
        return view('livewire.category.categories',['categories' => $categories, 'i' => $i]);
    }

    public function destroy($slug){

        try {
            $model = Category::whereSlug($slug)->first();
            if($model->delete()){
                session()->flash("success","Category deleted successfully.");
            }
            session()->flash("error","An error occured while deleting category.");
        } catch (Exception $e) {
            return view('admin.error');
        }

    }
}
