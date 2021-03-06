<div>
    <div class="mt-4">
        <div class="mt-2">
            <label class="text-gray-700" for="productName">Name</label>
            <input wire:model="productName" id="productName"
                class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
            @error('productName') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-2">
            <label class="text-gray-700" for="productDesc">Description</label>
            <input wire:model="productDesc" id="productDesc"
                class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
            @error('productDesc') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-2">
            <label class="text-gray-700" for="productStatus">Status</label>
            <select wire:model="productStatus" id="productStatus"
                class="w-full mt-2 rounded-md form-input focus:border-indigo-600">
                <option selected value="instock">Instock</option>
                <option value="outofstock">Outofstock</option>
                <option value="draft">Draft</option>
                <option value="publish">Publish</option>
                <option value="trash">Trash</option>
            </select>
            @error('productStatus') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-2">
            <label class="text-gray-700" for="productPrice">Price</label>
            <input wire:model="productPrice" id="productPrice"
                class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
            @error('productPrice') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mt-2">
            <label class="text-gray-700" for="productQuantity">Quantity</label>
            <input wire:model="productQuantity" id="productQuantity"
                class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
            @error('productQuantity') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-row mt-2">
            <div class="mr-2">
                <img class="w-20 h-20"
                    src="{{ $productBanner ? $productBanner->temporaryUrl() : $product->banner ?? '' }}" alt="">
                <div wire:loading wire:target="productBanner">Uploading...</div>
            </div>
            <div>
                <label class="text-gray-700" for="productBanner">Banner</label>
                <input wire:model="productBanner" id="productBanner"
                    class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="file">
                @error('productBanner') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-2">
            <p>Product Images</p>
            <div class="flex flex-row">
                <div class="flex flex-row">
                    @if ($productImages)
                        @foreach ($productImages as $key => $image)
                            <div class="relative" x-data="{showDelIcon: false}" x-on:mouseover="showDelIcon = true"
                                x-on:mouseout="showDelIcon = false" wire:key="{{ $key }}">
                                <img class="w-20 h-20 mr-2"
                                    src="{{ is_string($image) ? $image : $image->temporaryUrl() }}" alt="">
                                <span wire:click="deleteImage({{ $key }})" x-show="showDelIcon"
                                    class="absolute w-5 h-5 cursor-pointer top-2 right-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </div>
                        @endforeach
                    @endif
                    <div wire:loading wire:target="newProductImages">Uploading...</div>
                </div>
                <div>
                    <label class="text-gray-700" for="newProductImages">Add Image</label>
                    <input multiple wire:model="newProductImages" id="newProductImages"
                        class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="file">
                    @error('newProductImages.*') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end mt-4">
        <button wire:click="saveProduct"
            class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Save</button>
    </div>
</div>
