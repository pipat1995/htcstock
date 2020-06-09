<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- @yield('script') --}}
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/main.js') }}" defer></script> --}}
    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> --}}

</head>

<body>
    
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

        <x-navigationbar />
        <div class="app-main">

            <x-sidebar />
            <div class="app-main__outer">
                @include('partials.alerts')
                <div class="app-main__inner">
                    
                    @yield('content')

                    {{-- @extends('components.accessmodal') --}}
                </div>
                <x-footer />
            </div>
        </div>
    </div>

    @yield('modal')
    @yield('script')
</body>

</html>