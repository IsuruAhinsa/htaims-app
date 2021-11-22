<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

            .bg-image::before {
                content: ' ';
                display: block;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                z-index: 1;
                opacity: 0.5;
                background-image: url({{ \App\Models\Setting::getSettings()->loginBackground_path ? asset(\App\Models\Setting::getSettings()->loginBackground_path) : asset('img/bg-image.jpg') }});
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
            }

        </style>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="bg-image">
            <div class="font-sans text-gray-900 antialiased relative z-20">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
