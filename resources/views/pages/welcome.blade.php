<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon"/>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,
        h1 {
            font-family: "Raleway", sans-serif
        }

        body,
        html {
            height: 100%
        }

        .bgimg {
            background-image: url("{{ asset('assets/images/background/welcome.gif') }}");
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
        <div class="w3-display-topleft w3-padding-large w3-xlarge">
            {{-- Logo --}}
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                <a href="{{ url('/home') }}">Dashboard</a>
                @else
                <a href="{{ route('login') }}">Login</a>

                {{-- @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif --}}
                @endauth
            </div>
            @endif
        </div>
        <div class="w3-display-middle">
            <h1 class="w3-jumbo w3-animate-top">STOCK IT</h1>
            <hr class="w3-border-grey" style="margin:auto;width:40%">
            <p class="w3-large w3-center">BY HAIER</p>
        </div>
        <div class="w3-display-bottomleft w3-padding-large">
            {{-- Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a> --}}
        </div>
    </div>
</body>

</html>