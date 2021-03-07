<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
           
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <!-- Toast Container -->
        <!-- put taost notification in here , to cope when the toast more than one -->
        <div x-data="foo()" x-on:show-toast.window="createToasts($event.detail.message)" class="absolute top-0 right-0 m-5">
            <!-- Toast Notification Success-->
            <template x-if="toasts.length > 0">
                <template x-for="toast in toasts" :key="toast">
                    <div class="flex items-center px-3 py-2 mb-2 bg-green-500 border-l-4 border-green-700 shadow-md">
                        <!-- icons -->
                        <div class="mr-3 text-green-500 bg-white rounded-full">
                            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                            </svg>
                        </div>
                        <!-- message -->
                        <div class="max-w-xs text-white ">
                            <span x-text="toast.message"></span>
                        </div>
                    </div>
                </template>
            </template>
        </div>
        
        @livewireScripts
        <script>          
            function foo() {
                return {
                    toasts: [],
                    createToasts(msg) {
                        console.log(msg);
                        let tid = Date.now();
                        console.log(this.toasts)
                        this.toasts = [...this.toasts, {message: msg, id: tid}];
                        console.log(tid)
                        console.log(this.toasts)
                        setTimeout(() => {
                            console.log('ddd')
                            console.log(this.toasts)
                            this.toasts = this.toasts.filter(t => t.id != tid);
                            console.log('xxx')
                            console.log(this.toasts)
                        }, 3000);
                    }
                    
                }
            }
            
        </script>
    </body>
</html>
