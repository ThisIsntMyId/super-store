<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class OrderForm extends Component
{
    public Order $order;

    protected $rules = [
        'order.status' => 'required|placed,processing,dispatched,canceled,delivered',
        'order.trackable' => 'nullable|boolean',
        'order.user_id' => 'required|exists:users,id'
    ];

    public function mount()
    {
        $this->order = new Order;
    }

    public function save()
    {
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
