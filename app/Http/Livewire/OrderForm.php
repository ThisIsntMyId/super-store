<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class OrderForm extends Component
{
    public Order $order;
    public $cart = [];

    protected $rules = [
        'order.status' => 'required|in:placed,processing,dispatched,canceled,delivered',
        'order.trackable' => 'nullable|boolean',
        'order.user_id' => 'required|exists:users,id',
        'cart.*.productId' => 'required|exists:products,id',
        // 'cart.*.productPrice' => 'required|exists:products,price',
        'cart.*.productQuantity' => 'required|numeric',
        // 'cart.*.total' => 'required|number'
    ];

    public function mount()
    {
        $this->order = new Order;
    }

    public function createCartItem()
    {
        array_push($this->cart, [
            'productId' => null,
            // 'productPrice' => null,
            'productQuantity' => 0,
            // 'total' => 0,
        ]);
        // dd($this->cart);
    }

    public function removeCartItem($index)
    {
        array_splice($this->cart, $index, 1);
    }

    public function save()
    {
        $this->validate();
        dd($this->order);
    }

    public function render()
    {
        return view('livewire.order-form', [
            'products' => Product::all(),
            'users' => User::all()
        ]);
    }
}
