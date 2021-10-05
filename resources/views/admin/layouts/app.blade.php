<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Job Portal Admin') }}</title>
        <!-- Favicon -->
        <!-- <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png"> -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('admin_public/css/nucleo.css') }}" rel="stylesheet">
        <link href="{{ asset('admin_public/css/all.min.css') }}" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('admin_public/css/argon.css') }}" rel="stylesheet">
        <script src="{{ asset('/js/jquery.min.js') }}"></script>
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
            @include('admin.layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('admin.layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('admin.layouts.footers.guest')
        @endguest

        
        <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('admin_public/js/argon.js') }}"></script>
    </body>
</html>