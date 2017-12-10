<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="cWLD2UvsXZgutWJSEAtsW1jBvYlnK3lLDo600500">
    <title>Beastraffle</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- Links -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/mobile.css')}}">
    <link rel="stylesheet" href="{{asset('css/lightbox.css')}}">
    <link rel="stylesheet" href="{{asset('css/pignose.popup.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body id="body">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<div class="container">
    <header class="header">
        <a class="logo" href="{{ url('/') }}"><img src="images/logo2.png" width="150px" height="24px" alt="Beastraffle"></a>
        <p class="no-hidden" id="show-menu">Menu</p>
        <nav class="navbar hidden" id="menu">
            <ul>
                @guest
                    <li><a href="{{url('/redirect')}}">Login with Facebook</a></li>
                    <li><a href="{{url('/help')}}">Help</a></li>
                @else
                    <li><a href="{{route('tickets')}}">{{Auth::user()->tickets}} tickets</a></li>
                    <li><a href="{{route('profile')}}">{{Auth::user()->name}}</a></li>
                    <li><a href="{{url('/help')}}">Help</a></li>
                @endguest
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer">
        Beastraffle &copy 2017, all rights reserved. Made with <span style="color: #f74933">&#10084;</span> for streetwear.
    </footer>

    <!-- JavaScript -->
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/lightbox.js')}}"></script>
    <script src="{{asset('js/pignose.popup.js')}}"></script>
</div>
</body>
</html>