<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $products = [];
    public $sort;
    public $filter;
    // public $page;
    public $search;

    public function mount()
    {
        $this->products = Product::paginate(10);
        // $this->products = Product::all();
    }

    public function render()
    {
        return view('livewire.product-list', [
            // 'products' => Product::paginate(10)
        ]);
    }
}
