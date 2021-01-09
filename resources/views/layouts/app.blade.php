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

        @stack('header')


    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen flex flex-col">
            @livewire('component.navigation-menu')

            @if(isset($header))
            <header>
                <div class="container mx-auto pt-7 px-6 lg:px-8">
                    {{ $header ?? ''}}
                </div>
            </header>
            @endif
            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot ?? ''}}
                @include('cookie-consent::index')
            </main>

            @include("layouts.footer")
        </div>


        @stack('modals')
        @stack('scripts')

        @livewireScripts
        <x-livewire-alert::scripts />
    </body>
</html>
