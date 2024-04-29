<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @yield('js')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Style the input field */
        #myInput {
            padding: 20px;
            margin-top: -6px;
            border: 0;
            border-radius: 0;
            background: #f1f1f1;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a> --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div>
                        <svg with="50" height="50" viewBox="0 0 1024 1024" class="icon" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M960.1 258.4H245.8l-36.1-169H63.9v44h110.2l26.7 125 100.3 469.9 530 0.4v-44l-494.4-0.3-22.6-105.9H832l128.1-320.1z m-65 44L855.6 401H276.3l-21.1-98.6h639.9zM304.8 534.5L279.7 417h569.5l-47 117.5H304.8z"
                                    fill="#39393A"></path>
                                <path
                                    d="M375.6 810.6c28.7 0 52 23.3 52 52s-23.3 52-52 52-52-23.3-52-52 23.3-52 52-52m0-20c-39.7 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.3-72-72-72zM732 810.6c28.7 0 52 23.3 52 52s-23.3 52-52 52-52-23.3-52-52 23.3-52 52-52m0-20c-39.7 0-72 32.2-72 72s32.2 72 72 72c39.7 0 72-32.2 72-72s-32.3-72-72-72zM447.5 302.4h16v232.1h-16zM652 302.4h16v232.1h-16z"
                                    fill="#E73B37"></path>
                                <path d="M276.3 401l3.4 16-3.4-16z" fill="#343535"></path>
                            </g>
                        </svg>
                        <a class="navbar-brand" href="#"><span style="color: black;">Shop</span><span
                                style="color: rgb(212, 47, 5);">Savvy</span></a>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user.profile') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.products.index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                                    My Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

{{-- <div class="card container">
    <div class="card-header">Profile Information</div> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profil Information</div>    
                    <div class="card-body">
                        @include('partials.errors')
                        <form action="{{ route('users.update-profile') }}" method="POST">
                            @csrf 
                            @method('PUT')

                            <div class="form-group mt-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                            </div>

                            <div class="form-group mt-2">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="form-group mt-2">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4 text-center">
                                    <button type="submit" class="btn btn-success mt-4">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <a href="{{ route('user.profile') }}"><i class="fas fa-arrow-left"></i>
                        <?xml version="1.0" encoding="UTF-8" standalone="no"?>
                        <svg width="30px" height="30px" viewBox="0 -2 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                            
                            <title>arrow-left</title>
                            <desc>Created with Sketch Beta.</desc>
                            <defs>

                        </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-412.000000, -933.000000)" fill="#000000">
                                    <path d="M438,957 C438,958.104 437.104,959 436,959 L416,959 C414.896,959 414,958.104 414,957 L414,937 C414,935.896 414.896,935 416,935 L436,935 C437.104,935 438,935.896 438,937 L438,940 L440,940 L440,937 C440,934.791 438.209,933 436,933 L416,933 C413.791,933 412,934.791 412,937 L412,957 C412,959.209 413.791,961 416,961 L436,961 C438.209,961 440,959.209 440,957 L440,954 L438,954 L438,957 L438,957 Z M443,946 L421.414,946 L426.657,940.757 C427.048,940.367 427.048,939.733 426.657,939.343 C426.267,938.952 425.633,938.952 425.242,939.343 L418.343,946.242 C418.135,946.451 418.046,946.728 418.06,947 C418.046,947.272 418.135,947.549 418.343,947.758 L425.242,954.657 C425.633,955.048 426.267,955.048 426.657,954.657 C427.048,954.267 427.048,953.633 426.657,953.242 L421.414,948 L443,948 C443.553,948 444,947.553 444,947 C444,946.448 443.553,946 443,946 L443,946 Z" id="arrow-left" sketch:type="MSShapeGroup">

                        </path>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<footer>
    @include('partials.footer')
</footer>