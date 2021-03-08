<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Orders Index') }}
        </h2>
    </x-slot>

    <x-card>
        <h1>Orders Index</h1>
        <a href="{{route('admin.orders.create')}}" class="text-blue-500">Create</a>
        <livewire:order-list />
    </x-card>
</x-app-layout>
