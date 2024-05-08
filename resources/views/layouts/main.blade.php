<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rudraganga') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet" crossorigin>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" crossorigin>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}"/>
   
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light top-nav font-family-philosopher shadow-sm">
            <div class="container">
                <a class="navbar-brand logo-link" href="{{ url('/') }}"><img class="logo-img" src="{{ asset('assets/images/logo.png') }}" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto font-family-philosopher">
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Problems</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('consultants')}}">Consultants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="astro-shop">Astro Shop</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link" href="/reach-us">Contact us</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                       
                        <li class="nav-item">
                            <a class="nav-link btn" href="/login">{{ __('Login') }}</a>
                        </li>
                      

                        
                        <li class="nav-item">
                            <a class="nav-link" href="/register">{{ __('Join us') }}</a>
                        </li>
                        @endguest
                        
                        @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-black" href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="/logout" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>
        <main class="bg-antiquewhite">
            @yield('content')
        </main>
            <footer-section class="font-family-philosopher"/>
    </div>
</body>

</html>