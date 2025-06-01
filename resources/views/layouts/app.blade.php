<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Vite: CSS & JS einbinden -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CSRF Token für JS-Requests -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <div class="min-h-screen flex flex-col">

        {{-- Navigation --}}
        @include('layouts.navigation')

        {{-- Optionaler Header --}}
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- Hauptinhalt --}}
        <main class="flex-grow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        {{-- Footer (optional) --}}
        <footer class="bg-white dark:bg-gray-800 shadow py-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Alle Rechte vorbehalten.
        </footer>

    </div>

</body>
</html>