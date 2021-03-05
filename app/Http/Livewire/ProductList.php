<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $sort="id";
    public $filter;
    public $search="";

    protected $queryString = [
        'search' => ['except' => ''],
        'sort' => ['except' => 'id']
    ];

    public function toggleSort($fieldName)
    {
        if($this->sort === $fieldName) {
            $this->sort = '-' . $this->sort;
        } else if ($this->sort === '-' .  $fieldName) {
            $this->sort = 'id';
        } else if ($this->sort !== $fieldName) {
            $this->sort = $fieldName;
        }
    }

    public function delete(Product $product)
    {
        $product->delete();
    }
    public function edit(Product $product)
    {
        return redirect()->route('admin.products.edit', $product->id);
    }

    public function render()
    {
        return view('livewire.product-list', [
            'products' => Product::where('name', 'LIKE', '%'.$this->search.'%')
                                    ->orderBy($this->sort[0] == '-' ? substr($this->sort, 1) : $this->sort, $this->sort[0] == '-' ? 'asc' : 'desc')
                                    ->paginate(2)
        ]);
    }
}
