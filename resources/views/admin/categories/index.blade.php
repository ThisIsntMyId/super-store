<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Categories Index') }}
        </h2>
    </x-slot>

    <x-card>
        <div class="mt-3">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <livewire:categories-form />
    </x-card>
    <x-card>
        <livewire:categories-table />
    </x-card>
    
</x-app-layout>
