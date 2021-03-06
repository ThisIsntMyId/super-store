<div>
    <h2 class="text-2xl">
        Create Category
    </h2>

    <div>
        <div class="mt-4">
            <div class="mt-2">
                <label class="text-gray-700" for="categoryName">Name</label>
                <input wire:model="categoryName" id="categoryName"
                    class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
                @error('categoryName') <span class="error">{{ $message }}</span> @enderror
            </div>
    
            <div class="mt-2">
                <label class="text-gray-700" for="categoryDesc">Description</label>
                <input wire:model="categoryDesc" id="categoryDesc"
                    class="w-full mt-2 rounded-md form-input focus:border-indigo-600" type="text">
                @error('categoryDesc') <span class="error">{{ $message }}</span> @enderror
            </div>
    
            <div class="mt-2">
                <label class="text-gray-700" for="categoryParent">Parent</label>
                <select wire:model="categoryParent" id="categoryParent"
                    class="w-full mt-2 rounded-md form-input focus:border-indigo-600">
                    <option selected value="1">Instock</option>
                    <option value="2">Outofstock</option>
                    <option value="3">Draft</option>
                    <option value="4">Publish</option>
                    <option value="5">Trash</option>
                </select>
                @error('categoryParent') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-row items-center mt-2">
                <label class="text-gray-700" for="categoryFeatured">Featured</label>
                <input wire:model="categoryFeatured" id="categoryFeatured"
                    class="ml-2 rounded-md form-input focus:border-indigo-600" type="checkbox" value="1">
                @error('categoryFeatured') <span class="error">{{ $message }}</span> @enderror
            </div>

        </div>
    
        <div class="flex justify-end mt-4">
            <button wire:click="save"
                class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Save</button>
        </div>
    </div>
    
</div>
