<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ProductForm extends Component
{
    public $productName;
    public $productDesc;
    public $productStatus;
    public $productQuantity;
    public $productPrice;
    public $isEdit;
    public $product;

    public function mount(Request $request)
    {
        if($request->routeIs('admin.products.edit')) {
            $this->productName = $request->product->name;
            $this->productDesc = $request->product->description;
            $this->productStatus = $request->product->status;
            $this->productQuantity = $request->product->quantity;
            $this->productPrice = $request->product->price;
            $this->isEdit = true;
            $this->product = $request->product;
            // dd($this->product);
        }
    }

    protected $rules = [
        'productName' => 'required|min:6',
        'productDesc' => 'required|max:255',
        'productStatus' => 'required|in:instock,outofstock,draft,publish,trash',
        'productQuantity' => 'required|integer',
        'productPrice' => 'required|numeric',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveProduct()
    {
        $this->validate();
        if($this->isEdit) {
            $this->product->name = $this->productName;
            $this->product->description = $this->productDesc;
            $this->product->status = $this->productStatus;
            $this->product->quantity = $this->productQuantity;
            $this->product->price = $this->productPrice;
            $this->product->save();

            session()->flash('message', 'Product successfully updated.');
        } else {
            Product::create([
                'name' => $this->productName,
                'description' => $this->productDesc,
                'status' => $this->productStatus,
                'quantity' => $this->productQuantity,
                'price' => $this->productPrice,
            ]);

            session()->flash('message', 'Product successfully created.');
        }
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
