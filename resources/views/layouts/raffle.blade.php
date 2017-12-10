<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Hyperaffle')</title>

    <!-- Styles -->
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ns-default.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/ns-style-growl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pignose.popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
<header class="page-header">
    <nav class="page-navbar">
        <a href="{{ url('/') }}" class="logo">HYPERAFFLE</a>
        <ul>
            @guest
                <li><a href="{{url('/login')}}">Login</a></li>
                <li><a href="{{url('/register')}}">Register</a></li>
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

@yield('content')
<footer>
    Hyperaffle &copy 2017, all rights reserved. Made with <span style="color: #f74933">&#10084;</span> for streetwear.
</footer>
<script src="{{asset('js/lightbox.js')}}"></script>
<script src="{{asset('js/modernizr.custom.js')}}"></script>
<script src="{{asset('js/classie.js')}}"></script>
<script src="{{asset('js/notificationFx.js')}}"></script>
<script src="{{ asset('js/pignose.popup.js') }}"></script>
@if (Session::has('tickets'))
    <script>
        // create the notification
        var notification = new NotificationFx({
            message : '<p>You don\'t have enough tickets. Click on the link below to <a href="{{route('tickets')}}">buy tickets</a>.</p>',
            layout : 'growl',
            effect : 'scale',
            type : 'notice', // notice, warning, error or success
        });

        // show the notification
        notification.show();
    </script>
@endif
@if (Session::has('closed'))
    <script>
        // create the notification
        var notification = new NotificationFx({
            message : '<p>You can\'t add more tickets :(</p>',
            layout : 'growl',
            effect : 'scale',
            type : 'notice', // notice, warning, error or success
        });

        // show the notification
        notification.show();
    </script>
@endif
    @if (Session::has('success'))
        <script>
            // create the notification
            var notification = new NotificationFx({
                message : '<p>You have successfully joined to raffle.</p>',
                layout : 'growl',
                effect : 'scale',
                type : 'notice', // notice, warning, error or success
            });

            // show the notification
            notification.show();
        </script>
    @endif
</body>
</html>