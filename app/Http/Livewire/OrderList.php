<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;
    
    public function delete(Order $order)
    {
        $order->delete();
    }

    public function render()
    {
        return view('livewire.order-list', [
            'orders' => Order::paginate(10)
        ]);
    }
}
