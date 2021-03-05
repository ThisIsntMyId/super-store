<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <x-card>
        <h1>Products Index</h1>
        <div>
            <a class="p-3 m-2 bg-blue-600" href="{{ route('admin.products.create') }}">Create</a>
        </div>
        <div>
            <livewire:product-list />
        </div>
    </x-card>
</x-app-layout>
