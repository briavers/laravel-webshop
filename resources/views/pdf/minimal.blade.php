<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <style>
            @import 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap';
        </style>

        <!-- Styles -->
{{--        <link rel="stylesheet" href="{{ public_path(mix('css/app.css')) }}">--}}
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ public_path(mix('js/app.js')) }}" defer></script>

        @stack('header')


    </head>
    <body class="font-sans antialiased bg-white text-black" style="background-color: white; color: black">
        <div class="min-h-screen flex flex-col m-2">
          <!-- Page Content -->
            <main class="flex-grow">
                @yield('content')
            </main>
        </div>


        @stack('modals')
        @stack('scripts')

        @livewireScripts
    </body>
</html>
