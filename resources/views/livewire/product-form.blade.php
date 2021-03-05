<div>
    <div>
        <div class="mt-4">
            <div class="mt-2">
                <label class="text-gray-700" for="productName">Name</label>
                <input wire:model="productName" id="productName" class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
                @error('productName') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-2">
                <label class="text-gray-700" for="productDesc">Description</label>
                <input wire:model="productDesc" id="productDesc" class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
                @error('productDesc') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-2">
                <label class="text-gray-700" for="productStatus">Status</label>
                <select wire:model="productStatus" id="productStatus" class="w-full mt-2 rounded-md form-input focus:border-indigo-600" name="" id="">
                    <option value="instock">Instock</option>
                    <option value="outofstock">Outofstock</option>
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>
                    <option value="trash">Trash</option>
                </select>
                @error('productStatus') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-2">
                <label class="text-gray-700" for="productPrice">Price</label>
                <input wire:model="productPrice" id="productPrice" class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
                @error('productPrice') <span class="error">{{ $message }}</span> @enderror
            </div>
            
            <div class="mt-2">
                <label class="text-gray-700" for="productQuantity">Quantity</label>
                <input wire:model="productQuantity" id="productQuantity" class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
                @error('productQuantity') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <button wire:click="saveProduct" class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Save</button>
        </div>
    </div>
</div>
