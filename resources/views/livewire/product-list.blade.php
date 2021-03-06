<div>
    <div class="mt-3">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div>
        Search: <input type="text" wire:model="search">
        <div wire:click="$set('search', '')" class="relative inline-block w-6 h-6 text-gray-500 cursor-pointer right-7 top-2"><svg fill="none" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </div>
    </div>
    <table class="min-w-full leading-normal">
        <thead>
            <tr>
                <th
                    wire:click="toggleSort('name')"
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Name 
                    <x-sort-options :sort="$sort" field-name="name" />
                </th>
                <th
                    wire:click="toggleSort('description')"
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Description
                    <x-sort-options :sort="$sort" field-name="description" />
                </th>
                <th
                    wire:click="toggleSort('status')"
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Status
                    <x-sort-options :sort="$sort" field-name="status" />
                </th>
                <th
                    wire:click="toggleSort('price')"
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Price
                    <x-sort-options :sort="$sort" field-name="price" />
                </th>
                <th
                    wire:click="toggleSort('created_at')"
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Created at
                    <x-sort-options :sort="$sort" field-name="created_at" />
                </th>
                <th
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                    Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 w-10 h-10">
                            <img class="w-full h-full rounded-full" src="{{$product->banner}}" alt="" />
                        </div>

                        <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">{{$product->name}}</p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">{{$product->description}}</p>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                        <span aria-hidden class="absolute inset-0 bg-green-200 rounded-full opacity-50"></span>
                        <span class="relative">{{$product->status}}</span>
                    </span>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">$ {{$product->price}}</p>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <p class="text-gray-900 whitespace-no-wrap">{{$product->created_at}}</p>
                </td>
                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                    <div x-data="{ open: false }" class="relative text-gray-900 whitespace-no-wrap">
                        <button @click="open = true">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                </path>
                            </svg>
                        </button>
                        <div class="absolute z-50 flex flex-col w-24 p-0 bg-white border" x-show="open"
                            @click.away="open = false">
                            <button class="flex flex-row p-2 m-2 border-b-2" wire:click="delete({{$product->id}})">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                  </svg>
                                Delete
                            </button>
                            <button class="flex flex-row p-2 m-2" wire:click="edit({{$product->id}})">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                  </svg>
                                Edit
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach

            {{ $products->links() }}
        </tbody>
    </table>
</div>