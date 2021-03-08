<div>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    id 
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Status
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Detail
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Trackable
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Amount
                </th>
                <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Created at
                </th>
                <th
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">{{$order->id}}</p>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                        <span aria-hidden class="absolute inset-0 bg-green-200 rounded-full opacity-50"></span>
                        <span class="relative">{{$order->status}}</span>
                    </span>
                </td>
                <td x-data="{show: false}" class="relative px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p @mouseenter="show=true" @mouseleave="show=false" class="text-blue-500 whitespace-no-wrap cursor-pointer">View</p>
                    <div x-show="show" class="absolute top-0 z-50 w-56 p-2 bg-gray-400 left-20 h-30 order-detail">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach (json_decode($order->details, true)['cart'] as $key => $detail)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$detail['price']}}</td>
                                    <td>{{$detail['quantity']}}</td>
                                    <td>{{$detail['price'] * $detail['quantity']}}</td>
                                </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">{{$order->trackable}}</p>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">$ {{$order->amount}}</p>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">{{$order->created_at}}</p>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <div x-data="{ open: false }" class="relative text-gray-900 whitespace-no-wrap">
                        <button class="flex flex-row p-2 m-2" wire:click="delete({{$order->id}})">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                              </svg>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach

            {{ $orders->links() }}
        </tbody>
    </table>
</div>
