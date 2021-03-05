<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <x-card>
        <h1>Products Index</h1>
        <a href="{{ route('admin.products.create') }}">Create</a>
        <livewire:product-list />
    </x-card>
</x-app-layout>
