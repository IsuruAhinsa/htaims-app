<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body class="antialiased">

    <div class="relative flex items-top justify-center min-h-screen bg-white dark:bg-dark-primary sm:items-center sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 items-center">

            <div class="flex flex-col items-center pt-8 sm:justify-start sm:pt-0">

                <div class="flex items-center">
                    <div class="px-4 text-lg text-gray-500 border-r-2 border-gray-400 tracking-wider">
                        @yield('icon')
                    </div>

                    <div class="ml-4 text-indigo-500 text-3xl md:text-4xl font-semibold uppercase tracking-wider">
                        @yield('code')
                    </div>
                </div>

                <h1 class="text-gray-800 text-2xl md:text-3xl font-bold text-center mb-2">@yield('message')</h1>

                <p class="max-w-screen-md text-gray-500 md:text-lg text-center mb-12">@yield('message-long')</p>
            </div>
        </div>
    </div>

</body>
</html>
