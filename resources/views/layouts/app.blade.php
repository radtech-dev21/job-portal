<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href={{ asset('css/app.css') }}>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Job Portal') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif
                            @else
                            @php
                            $user = Auth::user();
                            $disabled_class = '';
                            if($user->email_is_verified == 0){
                            $disabled_class = 'disabled';
                            }elseif($user->phone_is_verified == 0){
                            $disabled_class = 'disabled';
                            }
                            @endphp
                            @if(Auth::user()->role != 'hirer')
                            <li class="nav-item">
                                <a class="nav-link {{$disabled_class}}" href="{{ route('employeeChat') }}">{{ __('Chat') }}</a>
                            </li>
                            @if(empty($employeeDetails))
                            <li class="nav-item">
                                <a class="nav-link {{$disabled_class}}" href="{{ route('create-employee') }}">{{ __('Apply as an Employee') }}</a>
                            </li>
                            @endif
                            @endif
                            @if(Auth::user()->role == 'hirer')
                            <li class="nav-item">
                                <a class="nav-link {{$disabled_class}}" href="{{ route('chat') }}">{{ __('Chat') }}</a>
                            </li>
                            @endif
                            <li class="nav-item dropdown d-flex">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if(!empty($employeeDetails))
                                    <li><a class="dropdown-item" href="{{ route('employee-dashboard') }}">{{ __('Profile') }}</a></li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/custom/auth.js') }}"></script>
        <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
        <script type="text/javascript">
        var base_url = "{{url('/')}}";
        </script>
    </body>
</html>