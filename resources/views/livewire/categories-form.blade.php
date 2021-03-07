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
                
            <div class="mt-2" wire:ignore>
                <label class="text-gray-700" for="categoryParent">Parent</label>
                <select wire:model="categoryParent" id="categoryParent"
                    class="w-full mt-2 rounded-md form-input focus:border-indigo-600">
                    @foreach ($categories as $category)
                        <option @if ($loop->first) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
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

    <script>
        $(document).ready(() => {
            $('#categoryParent').select2();
            $('#categoryParent').on('change', (e) => { @this.categoryParent = e.target.value})
        })
    </script>
    
</div>
