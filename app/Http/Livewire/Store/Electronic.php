<?php

namespace App\Http\Livewire\Store;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Electronic extends Component
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

    public $limitPerPage = 9;
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
    
    public function render(){

           $allProducts = Product::withWhereHas('category', fn($query) => $query->where('name', 'LIKE','Electronics')
            )->inRandomOrder()->paginate($this->limitPerPage);
        
        $this->hasMorePages = $allProducts->hasMorePages();
        return view('livewire.store.electronic',['allProducts' => $allProducts]);
    }
}
