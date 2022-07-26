<?php

namespace App\Http\Livewire\Store;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AllProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $categories;
    public $product;//query string
    public $category_id = null;

    public $filterByCategory = '';
    public $sortBy = '';
    public $showLimitFilter = '';

    public $queryString = ['product'];

    public $limitPerPage = 6;
    public $hasMorePages;
   
    public function loadMore()
    {
        $this->limitPerPage = $this->limitPerPage + 3;
    }

    public function mount() {
        $this->categories = Category::get();
    }

    public function setFilterByCategoryValue($category_id) {$this->filterByCategory = $category_id;}
    public function setSortBy($value) {$this->sortBy = $value;}
    public function setShowLimitFilter($value) {$this->limitPerPage = $value;}

    public function render()
    {
        if (!empty($this->filterByCategory)) {
            $allProducts = Product::with('category')->where('visibility','1')->where('category_id',$this->filterByCategory)->inRandomOrder()->paginate($this->limitPerPage);
        
        }elseif (!empty($this->sortBy) && $this->sortBy == 'A-Z') {
            $allProducts = Product::with('category')->where('visibility','1')->orderBy('name','ASC')->paginate($this->limitPerPage);

        }elseif (!empty($this->sortBy) && $this->sortBy == 'Lowest-Price') {
            $allProducts = Product::with('category')->where('visibility','1')->orderBy('price','ASC')->paginate($this->limitPerPage);

        }elseif (!empty($this->sortBy) && $this->sortBy == 'Highest-Price') {
            $allProducts = Product::with('category')->where('visibility','1')->orderBy('price','DESC')->paginate($this->limitPerPage);
        
        }elseif (!empty($this->showLimitFilter)) {
            $allProducts = Product::with('category')->where('visibility','1')->orderBy('price','DESC')->paginate($this->limitPerPage);

        } else {
            $allProducts = Product::with('category')->where('visibility','1')->inRandomOrder()->paginate($this->limitPerPage);
        }
        $this->hasMorePages = $allProducts->hasMorePages();
        return view('livewire.store.all-product',['allProducts' => $allProducts]);
    }
}
