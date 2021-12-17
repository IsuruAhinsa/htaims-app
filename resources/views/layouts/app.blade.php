<!DOCTYPE html>
<html
    x-cloak
    x-data="{darkMode: localStorage.getItem('dark') === 'true'}"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{'dark': darkMode}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="{{ \App\Models\Setting::getSettings()->logo_path ??  asset(\App\Models\Setting::getSettings()->logo_path) }}">
        <link rel="apple-touch-startup-image" href="{{ \App\Models\Setting::getSettings()->logo_path ??  asset(\App\Models\Setting::getSettings()->logo_path) }}">
        <link rel="shortcut icon" type="image/ico" sizes="32" href="{{ \App\Models\Setting::getSettings()->favicon_path ?  asset(\App\Models\Setting::getSettings()->favicon_path) : asset('favicon.ico') }} ">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <style>
            [x-cloak] { display: none !important; }
        </style>

        @livewireStyles

        @powerGridStyles

        @wireUiScripts

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-dark-primary min-h-screen">

        <x-notifications z-index="z-50" />

        <x-jet-banner />

        @livewire('partials.sidebar')

        <div class="ml-20">

            @livewire('navigation-menu')

            <!-- Page Heading -->
            {{--@if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
            @endif--}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div>

        @stack('modals')

        @livewireScripts

        @powerGridScripts

        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
        <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

        <script>
            tippy('.sidebar-link', {
                placement: 'right',
                arrow: false,
                theme: 'light',
                content:(reference)=>reference.getAttribute('data-title'),
            });
        </script>
    </body>
</html>
