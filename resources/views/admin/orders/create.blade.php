<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Orders Create') }}
        </h2>
    </x-slot>

    <x-card>
        <h1>Orders Create</h1>
        <livewire:order-form />
    </x-card>
</x-app-layout>
