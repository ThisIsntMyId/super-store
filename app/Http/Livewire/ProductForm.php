<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
    use WithFileUploads;

    public $productName;
    public $productDesc;
    public $productStatus;
    public $productQuantity;
    public $productPrice;
    public $productBanner;
    public $productImages;
    public $newProductImages = [];
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
            $this->productImages = $request->product->images;
            $this->isEdit = true;
            $this->product = $request->product;
        }
    }

    protected $rules = [
        'productName' => 'required|min:6',
        'productDesc' => 'required|max:255',
        'productStatus' => 'required|in:instock,outofstock,draft,publish,trash',
        'productQuantity' => 'required|integer',
        'productPrice' => 'required|numeric',
        'productBanner' => 'nullable|image|max:1024',
        'newProductImages.*' => 'nullable|image|max:1024'
    ];

    public function updatedNewProductImages($val)
    {
        $this->productImages = array_merge($this->productImages, $val);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function deleteImage($index)
    {
        array_splice($this->productImages, $index, 1);
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

            if($this->productBanner) {
                $this->productBanner = $this->productBanner->storeAs('photos', 'banner_' . $this->product->id, 'public');
                $this->product->banner = Storage::url($this->productBanner);
            }

            $this->productImages = collect($this->productImages)
                ->map(function($val, $key) {
                    if(!is_string($val)) {
                        return Storage::url($val->storeAs('productImages', 'productImage_'. $this->product->id . '_' . ($key + 1), 'public'));
                    } else {
                        return $val;
                    }
                });
            $this->product->images = $this->productImages;
            
            $this->product->save();
            session()->flash('message', 'Product successfully updated.');
        } else {

            $this->product = Product::create([
                'name' => $this->productName,
                'description' => $this->productDesc,
                'status' => $this->productStatus,
                'quantity' => $this->productQuantity,
                'price' => $this->productPrice,
            ]);

            if($this->productBanner) {
                $this->productBanner = $this->productBanner->storeAs('photos', 'banner_' . $this->product->id, 'public');
                $this->product->banner = Storage::url($this->productBanner);
            }

            $this->productImages = collect($this->productImages)
                ->map(function($val, $key) {
                    if(!is_string($val)) {
                        return Storage::url($val->storeAs('productImages', 'productImage_'. $this->product->id . '_' . ($key + 1), 'public'));
                    } else {
                        return $val;
                    }
                });

            $this->product->images = $this->productImages;
            
            $this->product->save();
            session()->flash('message', 'Product successfully created.');
        }
        return redirect()->route('admin.products.index');
    }

    public function render()
    {
        return view('livewire.product-form');
    }
}
