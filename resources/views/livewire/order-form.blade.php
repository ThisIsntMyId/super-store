<div>
    <div class="mt-4">
        <div class="mt-2" wire:ignore>
            <label class="text-gray-700" for="order-status">Status</label>
            <select wire:model="order.status" id="order-status"
                class="w-full mt-2 rounded-md form-input focus:border-indigo-600">
                @foreach (['placed','processing','dispatched','canceled','delivered'] as $status)
                <option @if ($loop->first) selected @endif value="{{$status}}">{{$status}}</option>
                @endforeach
            </select>
            @error('order.status') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-2">
            <label class="text-gray-700" for="order.user_id">User</label>
            <select wire:model="order.user_id" id="order.user_id"
                class="w-full mt-2 rounded-md form-input focus:border-indigo-600">
                @foreach ($users as $user)
                    <option @if ($loop->first) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            @error('order.user_id') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-row items-center mt-2">
            <label class="text-gray-700" for="order.trackable">Trackable</label>
            <input wire:model="order.trackable" id="order.trackable"
                class="ml-2 rounded-md form-input focus:border-indigo-600" type="checkbox" value="1">
            @error('order.trackable') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div wire:ignore x-data="{cart: [], products: window.productsList }">
            <button x-on:click="cart = cart.concat({productId: null, productPrice: 0, productQuantity: 0})" class="p-2 bg-blue-400">Add</button>
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
                    <template x-for="(cartItem, cartItemIndex) in cart">
                        <tr>
                            <td>
                                <select x-model="cardItem.productId" class="w-full mt-2 rounded-md form-input focus:border-indigo-600">
                                    <template x-for="(product, index) in products">
                                        <option x-bind:value="product.id" x-text="product.name">aa</option>
                                    </template>
                                </select>
                            </td>
                            <td x-text="products.filter()"></td>
                            <td>
                                <input type="text" x-model="cardItem.quantity">
                            </td>
                            <td x-text="'xxx'"></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <div wire:ignore x-data="{names: ['']}">
            <button x-on:click="names = names.concat('')">+</button>
            <template x-for="(name, i) in names" :key="i">
                <div>
                    <input x-model="names[i]" type="text">
                    <button x-on:click="names = names.filter((n, ni) => i !== ni)">-</button>
                </div>
            </template>
        </div>
    </div>

    <div class="flex justify-end mt-4">
        <button wire:click="save"
            class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Save</button>
    </div>

    <script>
        const productsList = @json($products->toArray())
    </script>
</div>
