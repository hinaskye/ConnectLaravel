<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<?php
  $user = Auth::user();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top nav-background">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left nav-inline">
                        <li><a href="{{ route('home') }}"><img src="{{ asset('images/Logo.png') }}" width =25%></a><li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('auth.login') }}">Login</a></li>
                            <li><a href="{{ route('auth.register') }}">Register</a></li>
                        @else
                        <div class="topwelcome">
                            <h5 class="topusername">Welcome, <?php echo $user->username; ?></h5>
                            <li class="dropdown dropdownuser">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">

                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                      <a href="{{ url('/home') }}">Home</a>
                                      <a href="{{ url('/profile') }}">My Profile</a>
                                      <a href="{{ url('/profile') }}">Setting</a>
                                      <a href="{{ url('/about') }}">Founders</a>
                                      <a href="https://www.paypal.me/lcemocha">Donate Money Here</a>
                                      <a href="{{ route('auth.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

                                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
