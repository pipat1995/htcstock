<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('public/favicon.ico') }}" type="image/x-icon" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/w3.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Lato", sans-serif;
        }

        body,
        html {
            height: 100%;
            color: #777;
            line-height: 1.8;
        }

        /* Create a Parallax Effect */
        .bgimg-1,
        .bgimg-2,
        .bgimg-3 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* First image (Logo. Full height) */
        .bgimg-1 {
            background-image: url('/w3images/parallax1.jpg');
            min-height: 100%;
        }

        /* Second image (Portfolio) */
        .bgimg-2 {
            background-image: url("{{ asset('assets/images/background/welcome.gif') }}");
            min-height: 400px;
        }

        /* Third image (Contact) */
        .bgimg-3 {
            background-image: url("/w3images/parallax3.jpg");
            min-height: 400px;
        }

        .w3-wide {
            letter-spacing: 10px;
        }

        .w3-hover-opacity {
            cursor: pointer;
        }

        /* Turn off parallax scrolling for tablets and phones */
        @media only screen and (max-device-width: 1600px) {

            .bgimg-1,
            .bgimg-2,
            .bgimg-3 {
                background-attachment: scroll;
                min-height: 400px;
            }
        }

        /* body,
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
        } */
    </style>
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar" id="myNavbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
                <i class="fa fa-bars"></i>
            </a>
            @if (Route::has('login'))
            @auth
            <a href="{{ route('logout') }}" class="w3-bar-item w3-button w3-hide-small" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> LOGOUT</a>
            @else
            <a href="{{ route('login') }}" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i>
                LOGIN</a>
            @endif
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
            @if (Route::has('login'))
            @auth
            <a href="{{ route('logout') }}" class="w3-bar-item w3-button" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> LOGOUT</a>
            @else
            <a href="{{ route('login') }}" class="w3-bar-item w3-button" onclick="toggleFunction()"><i
                    class="fa fa-user"></i> LOGIN</a>
            @endauth
            @endif
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <!-- Second Parallax Image with Portfolio Text -->
    <div class="bgimg-2 w3-display-container w3-opacity-min">
        <div class="w3-display-middle">
            <span class="w3-xxlarge w3-text-white w3-wide">ALL SYSTEM</span>
        </div>
    </div>

    <!-- Container (Portfolio Section) -->
    <div class="w3-content w3-container w3-padding-64" id="portfolio">

        <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
        <div class="w3-row-padding w3-center">
            <div class="w3-col m3">
                <img src="" style="width:100%" onclick="goTo('home')"
                    class="w3-hover-opacity" alt="IT STOCK">
            </div>

            <div class="w3-col m3">
                <img src="" style="width:100%" onclick="goTo('accounts/home')"
                    class="w3-hover-opacity" alt="ACCOUNT STOCK">
            </div>

            {{-- <div class="w3-col m3">
                <img src="{{asset('assets/images/avatars/3.jpg')}}" style="width:100%" class="w3-hover-opacity"
                    alt="Bear closeup">
            </div>

            <div class="w3-col m3">
                <img src="{{asset('assets/images/avatars/4.jpg')}}" style="width:100%" class="w3-hover-opacity"
                    alt="Quiet ocean">
            </div> --}}
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank"
                class="w3-hover-text-green">w3.css</a></p>
    </footer>

    <script type="text/javascript">
        // Change style of navbar on scroll
        window.onscroll = function() {myFunction()};
        function myFunction() {
            var navbar = document.getElementById("myNavbar");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
            } else {
                navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
            }
        }
        
        // Used to toggle the menu on small screens when clicking on the menu button
        function toggleFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
        
        function goTo(uri) {
            window.location = uri
        }
    </script>

</body>

</html>