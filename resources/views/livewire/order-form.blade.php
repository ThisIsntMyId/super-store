<div>
    <div class="mt-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $key => $error)
                    @dump($key, $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mt-2">
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

        <div>
            <button wire:click="createCartItem" >Add</button>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $index => $cartItem)
                        <tr>
                            <td>
                                <select wire:model="cart.{{$index}}.productId">
                                    <option value="1">pr1</option>
                                    <option value="2">pr2</option>
                                    <option value="3">pr3</option>
                                    <option value="4">pr4</option>
                                    <option value="5">pr5</option>
                                    <option value="6">pr6</option>
                                    <option value="7">pr7</option>
                                    <option value="8">pr8</option>
                                    <option value="9">pr9</option>
                                    <option value="10">pr10</option>
                                </select>
                                @error('cart.*.productId')<div class="error">{{ $message }}</div>@enderror
                            </td>
                            <td>$xxx</td>
                            <td>
                                <input wire:model="cart.{{$index}}.productQuantity" type="text">
                                @error('cart.*.productQuantity')<div class="error">{{ $message }}</div>@enderror
                            </td>
                            <td>$yyy</td>
                            <td><button wire:click="removeCartItem({{$index}})">Remove</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @dump($cart)

        {{-- <div wire:ignore x-data="{cart: [], products: window.productsList }">
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
        </div> --}}

        {{-- <div wire:ignore x-data="{names: ['']}">
            <button x-on:click="names = names.concat('')">+</button>
            <template x-for="(name, i) in names" :key="i">
                <div>
                    <input x-model="names[i]" type="text">
                    <button x-on:click="names = names.filter((n, ni) => i !== ni)">-</button>
                </div>
            </template>
        </div> --}}
    </div>

    <div class="flex justify-end mt-4">
        <button wire:click="save"
            class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Save</button>
    </div>

    <script>
        const productsList = @json($products->toArray())
    </script>
</div>
