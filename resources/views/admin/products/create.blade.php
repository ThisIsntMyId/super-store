<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Products Create') }}
        </h2>
    </x-slot>

    <x-card>
        <h1>Products Create</h1>
        <livewire:product-form />
    </x-card>
</x-app-layout>
