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

        .custom-margin-right {
            margin-right: 20px;
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
                {{-- <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user.profile') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.products.index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
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
                </div> --}}
                @if(Auth::check())
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
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="dropdown">
                     
                                        <button id="dLabel" type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                                        </button>
                         
                                        <div class="dropdown-menu" aria-labelledby="dLabel">
                                            <div class="row total-header-section">
                                                @php $total = 0 @endphp
                                                @foreach((array) session('cart') as $id => $details)
                                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                                @endforeach
                                                <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                                    <p>Total: <span class="text-success">$ {{ $total }}</span></p>
                                                </div>
                                            </div>
                                            @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                    <div class="row cart-detail">
                                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                            {{-- <img src="{{ asset('images') }}/{{ $details['image'] }}" /> --}}
                                                            @if(isset($details['image']))
                                                                <img src="{{ asset('images') }}/{{ $details['image'] }}" />
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                            <p>{{ $details['product_name'] }}</p>
                                                            <span class="price text-success"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                                                </div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>  
                @else
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav"> 
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('welcome') }}"><svg viewBox="0 0 24 24" width="20px" height="20px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 18H9" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M21.6359 12.9579L21.3572 14.8952C20.8697 18.2827 20.626 19.9764 19.451 20.9882C18.2759 22 16.5526 22 13.1061 22H10.8939C7.44737 22 5.72409 22 4.54903 20.9882C3.37396 19.9764 3.13025 18.2827 2.64284 14.8952L2.36407 12.9579C1.98463 10.3208 1.79491 9.00229 2.33537 7.87495C2.87583 6.7476 4.02619 6.06234 6.32691 4.69181L7.71175 3.86687C9.80104 2.62229 10.8457 2 12 2C13.1543 2 14.199 2.62229 16.2882 3.86687L17.6731 4.69181C19.9738 6.06234 21.1242 6.7476 21.6646 7.87495" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </li>
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('user.cart.index') }}" tabindex="-1" aria-disabled="true"><svg viewBox="0 0 24 24" width="20px" height="20px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M3.86376 16.4552C3.00581 13.0234 2.57684 11.3075 3.47767 10.1538C4.3785 9 6.14721 9 9.68462 9H14.3153C17.8527 9 19.6214 9 20.5222 10.1538C21.4231 11.3075 20.9941 13.0234 20.1362 16.4552C19.5905 18.6379 19.3176 19.7292 18.5039 20.3646C17.6901 21 16.5652 21 14.3153 21H9.68462C7.43476 21 6.30983 21 5.49605 20.3646C4.68227 19.7292 4.40943 18.6379 3.86376 16.4552Z" stroke="#000000" stroke-width="1.5"></path> <path opacity="0.5" d="M19.5 9.5L18.7896 6.89465C18.5157 5.89005 18.3787 5.38775 18.0978 5.00946C17.818 4.63273 17.4378 4.34234 17.0008 4.17152C16.5619 4 16.0413 4 15 4M4.5 9.5L5.2104 6.89465C5.48432 5.89005 5.62128 5.38775 5.90221 5.00946C6.18199 4.63273 6.56216 4.34234 6.99922 4.17152C7.43808 4 7.95872 4 9 4" stroke="#000000" stroke-width="1.5"></path> <path d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4C15 4.55228 14.5523 5 14 5H10C9.44772 5 9 4.55228 9 4Z" stroke="#000000" stroke-width="1.5"></path> </g></svg><span id="cart-badge" class="badge bg-danger">0</span>Cart</a> --}}
                            </li>
                        </ul>
                        @if (Route::has('login'))
                            @auth
                                <ul class="navbar-nav mr-auto mb-4"> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                                    </li>
                                </ul>
                            @else
                                <ul class="navbar-nav jus mt-3"> 
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-primary px-4 py-2 custom-margin-right" href="{{ route('login') }}">Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-success px-4 py-2" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                </ul>
                            @endauth
                        @endif
                    </div>
                @endif
            </div>
        </nav>
    </div>
    

        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <div class="card mb-6">
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><svg width="30px" hight="30px"viewBox="0 0 64 64"
                                    xmlns="http://www.w3.org/2000/svg" stroke-width="3" stroke="#000000" fill="none">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M43.12,58H20.88a2.33,2.33,0,0,1-2.33-2.33V28.89a1.15,1.15,0,0,1,.37-.85L30.73,17a1.16,1.16,0,0,1,1.56,0L45.05,28a1.18,1.18,0,0,1,.4.88V55.7A2.33,2.33,0,0,1,43.12,58Z"
                                            stroke-linecap="round"></path>
                                        <path d="M32,25.2c-4.39,0-7.95-4.31-7.95-9.62S27.61,6,32,6s8,4.3,8,9.61"
                                            stroke-linecap="round"></path>
                                        <path d="M39.78,46.88a8.1,8.1,0,1,1-1.53-13.8"></path>
                                        <line x1="22.68" y1="38.07" x2="36.17" y2="38.07"></line>
                                        <line x1="22.68" y1="43.12" x2="34.54" y2="43.12"></line>
                                    </g>
                                </svg> {{ $product->price }}€</p>
                            <p class="card-text"><svg fill="#000000" width="30" hight="30" viewBox="0 0 14 14"
                                    role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="m 6.0528223,11.9935 0.0145,0 c 0.579,0 1.1105,-0.1405 1.594,-0.4205 0.484,-0.28 0.867,-0.677 1.152,-1.1925 0.2835,-0.5135 0.4265,-1.0685 0.4265,-1.665 0,-0.482 -0.083,-0.9275 -0.255,-1.335 0.285,-0.0595 0.63,-0.177 0.9895,-0.3995 0.2174997,0.5265 0.3299997,1.097 0.3299997,1.713 0,1.1475 -0.3899997,2.1525 -1.1849997,3.015 -0.796,0.856 -1.8085,1.291 -3.046,1.291 -1.245,0 -2.261,-0.4295 -3.05,-1.2905 -0.788,-0.86 -1.1775,-1.8655 -1.1775,-3.0145 0,-1.1415 0.373,-2.13 1.12,-2.9675 0.8175,-0.923 1.8555,-1.385 3.1075,-1.385 0.5285,0 1.017,0.0825 1.468,0.246 -0.146,0.286 -0.279,0.637 -0.3145,1.0145 -0.3585,-0.15 -0.743,-0.225 -1.1555,-0.225 -0.8685,0 -1.6145,0.326 -2.2375,0.9775 -0.622,0.6525 -0.934,1.4405 -0.934,2.363 0,0.6 0.1425,1.155 0.4275,1.6645 0.283,0.518 0.667,0.915 1.1505,1.1935 0.3225,0.1875 0.6635,0.315 1.0255,0.375 3.1035,-1.2 2.7385,-7.08 2.7155,-7.403 l 0.0265,0.0825 c 1.8229997,4.867 -2.1505,7.372 -2.1505,7.372 l -0.0375,0 -0.0045,-0.0095 z M 11.538822,1.272 c -0.508,1.0785 -1.448,1.279 -1.448,1.279 -0.9389997,0.2385 -1.2669997,0.6005 -1.2669997,0.6005 -0.9395,0.9445 -0.2,2.091 -0.2,2.091 2.0294997,-0.462 2.7704997,-2.129 2.7704997,-2.129 -0.0905,1.12 -2.5054997,2.4435 -2.5054997,2.4435 0.7995,0.7815 1.5619997,0.6875 2.0659997,0.387 0.668,-0.3975 0.989,-1.2675 0.989,-1.2675 0.647,-1.9355 -0.405,-3.405 -0.405,-3.4045 z M 6.5513223,1 c 0.997,1.677 1.54,3.1825 1.662,3.54 l 0,-0.0145 C 7.9673223,1.9415 6.5483223,1 6.5483223,1 l 0.003,0 z">
                                        </path>
                                    </g>
                                </svg>{{ $product->brand }}</p>
                            <p class="card-text"><svg fill="#000000" width="30" hight="30" version="1.1"
                                    id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 46.136 46.136"
                                    xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <path
                                                d="M45.935,32.097L33.265,9.731c-0.369-0.526-1.184-1.091-1.802-1.257L17.765,4.805c-0.622-0.167-1.264,0.206-1.429,0.827 l-0.341,1.259c-0.867-0.486-1.773-0.969-2.741-1.439c-4.531-2.196-9-3.616-11.379-3.616c-0.862,0-1.438,0.191-1.707,0.569 C0.05,2.567-0.063,2.847,0.042,3.261c0.425,1.67,4.429,4.637,9.74,7.21c1.609,0.78,3.212,1.46,4.719,2.013l-1.834,6.844 c-0.163,0.62-0.081,1.605,0.189,2.189l13.038,22.158c0.27,0.584,0.942,0.794,1.503,0.475l18.203-10.512 C46.153,33.315,46.302,32.624,45.935,32.097z M21.017,12.09c0.266-0.154,0.558-0.221,0.845-0.285 c0.323,0.381,0.546,0.724,0.62,0.991c0.044,0.174,0.031,0.31-0.049,0.416c-0.156,0.224-0.612,0.345-1.273,0.345 c-0.374,0-0.822-0.048-1.299-0.121C20.105,12.898,20.466,12.408,21.017,12.09z M10.013,9.992c-5.779-2.8-9.129-5.57-9.461-6.862 C0.51,2.955,0.525,2.819,0.601,2.715c0.16-0.225,0.615-0.346,1.276-0.346c2.305,0,6.683,1.398,11.146,3.562 c1.028,0.5,1.957,0.997,2.831,1.487l-1.217,4.556C13.161,11.427,11.594,10.759,10.013,9.992z M23.937,17.145 c-1.395,0.804-3.182,0.33-3.989-1.07c-0.388-0.675-0.463-1.438-0.294-2.142c0.553,0.091,1.077,0.151,1.509,0.151 c0.862,0,1.436-0.19,1.705-0.569c0.116-0.165,0.234-0.441,0.129-0.855c-0.068-0.271-0.26-0.584-0.512-0.918 c1.005,0.007,1.986,0.481,2.521,1.411C25.812,14.555,25.331,16.344,23.937,17.145z">
                                            </path>
                                        </g>
                                    </g>
                                </svg> {{ $product->size }}</p>
                            <p class="card-text"><svg fill="#000000" width="30" hight="30" viewBox="0 0 36 36"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>color_palette_solid</title>
                                        <g id="b894e32b-0437-45ab-b8bf-9f0c4e8f57cd" data-name="Layer 3">
                                            <path
                                                d="M32.23,14.89c-2.1-.56-4.93,1.8-6.34.3-1.71-1.82,2.27-5.53,1.86-8.92-.33-2.78-3.51-4.08-6.66-4.1A18.5,18.5,0,0,0,7.74,7.59c-6.64,6.59-8.07,16-1.37,22.48,6.21,6,16.61,4.23,22.67-1.4a17.73,17.73,0,0,0,4.22-6.54C34.34,19.23,34.44,15.49,32.23,14.89ZM9.4,10.57a2.23,2.23,0,0,1,2.87,1.21,2.22,2.22,0,0,1-1.81,2.53A2.22,2.22,0,0,1,7.59,13.1,2.23,2.23,0,0,1,9.4,10.57ZM5.07,20.82a2.22,2.22,0,0,1,1.82-2.53A2.22,2.22,0,0,1,9.75,19.5,2.23,2.23,0,0,1,7.94,22,2.24,2.24,0,0,1,5.07,20.82Zm7,8.33a2.22,2.22,0,0,1-2.87-1.21A2.23,2.23,0,0,1,11,25.41a2.23,2.23,0,0,1,2.87,1.21A2.22,2.22,0,0,1,12,29.15ZM15,8.26a2.23,2.23,0,0,1,1.81-2.53,2.24,2.24,0,0,1,2.87,1.21,2.22,2.22,0,0,1-1.82,2.53A2.21,2.21,0,0,1,15,8.26Zm5.82,22.19a2.22,2.22,0,0,1-2.87-1.21,2.23,2.23,0,0,1,1.81-2.53,2.24,2.24,0,0,1,2.87,1.21A2.22,2.22,0,0,1,20.78,30.45Zm5-10.46a3.2,3.2,0,0,1-1.69,1.76,3.53,3.53,0,0,1-1.4.3,2.78,2.78,0,0,1-2.56-1.5,2.49,2.49,0,0,1-.07-2,3.2,3.2,0,0,1,1.69-1.76,3,3,0,0,1,4,1.2A2.54,2.54,0,0,1,25.79,20Z">
                                            </path>
                                        </g>
                                    </g>
                                </svg> {{ $product->color }}</p>
                            <p class="card-text"><svg viewBox="0 0 48 48" width="30" hight="30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M18.8832 4.69719C19.2737 4.30667 19.9069 4.30667 20.2974 4.69719L23.888 8.28778L27.469 4.7068C27.8595 4.31628 28.4927 4.31628 28.8832 4.7068C29.2737 5.09733 29.2737 5.73049 28.8832 6.12102L25.3022 9.702L28.7827 13.1825C29.1732 13.573 29.1732 14.2062 28.7827 14.5967C28.3922 14.9872 27.759 14.9872 27.3685 14.5967L23.888 11.1162L20.3979 14.6063C20.0074 14.9968 19.3743 14.9968 18.9837 14.6063C18.5932 14.2158 18.5932 13.5826 18.9837 13.1921L22.4738 9.702L18.8832 6.1114C18.4927 5.72088 18.4927 5.08771 18.8832 4.69719Z"
                                            fill="#333333"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M23.86 15.0513C24.0652 14.9829 24.2871 14.9829 24.4923 15.0513L39.2705 19.9765C39.4691 20.0336 39.6499 20.1521 39.783 20.323L43.7861 25.4612C43.9857 25.7173 44.0485 26.0544 43.9545 26.3652C43.8902 26.5779 43.7579 26.7602 43.5821 26.887L28.1827 32.0159L24.965 27.8858C24.7754 27.6424 24.4839 27.5001 24.1753 27.5004C23.8667 27.5007 23.5755 27.6434 23.3863 27.8871L20.186 32.0093L4.74236 26.8577C4.58577 26.7329 4.46805 26.5621 4.40853 26.3652C4.31456 26.0544 4.37733 25.7173 4.57688 25.4612L8.50799 20.4154C8.62826 20.2191 8.81554 20.0652 9.04466 19.9889L23.86 15.0513ZM35.8287 20.9376L24.1802 24.8197L12.5277 20.9362L24.1762 17.0541L35.8287 20.9376Z"
                                            fill="#333333"></path>
                                        <path
                                            d="M28.1442 34.1368L39.991 30.1911L39.9905 36.7628C39.9905 38.054 39.1642 39.2003 37.9392 39.6086L25.1762 43.863V31.4111L27.0393 33.8026C27.2997 34.1368 27.7423 34.2706 28.1442 34.1368Z"
                                            fill="#333333"></path>
                                        <path
                                            d="M23.1762 31.4191V43.863L10.4131 39.6086C9.18811 39.2003 8.36183 38.054 8.36175 36.7628L8.36132 30.1732L20.2251 34.1306C20.6277 34.2649 21.0712 34.1305 21.3314 33.7953L23.1762 31.4191Z"
                                            fill="#333333"></path>
                                    </g>
                                </svg> {{ $product->stock }}</p>
                            <p class="card-text"><svg viewBox="0 0 24 24" width="30" hight="30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M6 10C8.20914 10 10 8.20914 10 6C10 3.79086 8.20914 2 6 2C3.79086 2 2 3.79086 2 6C2 8.20914 3.79086 10 6 10Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M18 22C20.2091 22 22 20.2091 22 18C22 15.7909 20.2091 14 18 14C15.7909 14 14 15.7909 14 18C14 20.2091 15.7909 22 18 22Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </g>
                                </svg> {{ $product->category->name }} </p>
                            <div class="svg-container">
                                <p class="card-text">
                                    <svg width="20px" height="20px" viewBox="-0.5 0 15 15"
                                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill="#31b701" fill-rule="evenodd"
                                                d="M61,154.006845 C61,153.45078 61.4499488,153 62.0068455,153 L73.9931545,153 C74.5492199,153 75,153.449949 75,154.006845 L75,165.993155 C75,166.54922 74.5500512,167 73.9931545,167 L62.0068455,167 C61.4507801,167 61,166.550051 61,165.993155 L61,154.006845 Z M62,157 L74,157 L74,166 L62,166 L62,157 Z M64,152.5 C64,152.223858 64.214035,152 64.5046844,152 L65.4953156,152 C65.7740451,152 66,152.231934 66,152.5 L66,153 L64,153 L64,152.5 Z M70,152.5 C70,152.223858 70.214035,152 70.5046844,152 L71.4953156,152 C71.7740451,152 72,152.231934 72,152.5 L72,153 L70,153 L70,152.5 Z"
                                                transform="translate(-61 -152)"></path>
                                        </g>
                                    </svg>
                                    {{ $product->created_at->format('Y-M-d') }}
                                </p>
                                <p class="card-text">
                                    <svg width="20px" height="20px" viewBox="-0.5 0 15 15"
                                        xmlns="http://www.w3.org/2000/svg" fill="#ff0000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill="#ff0000" fill-rule="evenodd"
                                                d="M61,154.006845 C61,153.45078 61.4499488,153 62.0068455,153 L73.9931545,153 C74.5492199,153 75,153.449949 75,154.006845 L75,165.993155 C75,166.54922 74.5500512,167 73.9931545,167 L62.0068455,167 C61.4507801,167 61,166.550051 61,165.993155 L61,154.006845 Z M62,157 L74,157 L74,166 L62,166 L62,157 Z M64,152.5 C64,152.223858 64.214035,152 64.5046844,152 L65.4953156,152 C65.7740451,152 66,152.231934 66,152.5 L66,153 L64,153 L64,152.5 Z M70,152.5 C70,152.223858 70.214035,152 70.5046844,152 L71.4953156,152 C71.7740451,152 72,152.231934 72,152.5 L72,153 L70,153 L70,152.5 Z"
                                                transform="translate(-61 -152)" />
                                        </g>
                                    </svg>
                                    {{ $product->updated_at->format('Y-M-d') }}
                                </p>
                            </div>

                            <div style="text-align: center;">
                                <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-warning" style="display: inline-block; color: #ffffff;">
                                    <svg viewBox="0 0 24 24" fill="none"width="30px" height="30px" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H13M19 15.5H17" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#ffffff" stroke-width="1.5"></path> <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#ffffff" stroke-width="1.5"></path> <path d="M5 6H8M5.5 13H16.0218C16.9812 13 17.4609 13 17.8366 12.7523C18.2123 12.5045 18.4013 12.0636 18.7792 11.1818L19.2078 10.1818C20.0173 8.29294 20.4221 7.34853 19.9775 6.67426C19.5328 6 18.5054 6 16.4504 6H12" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>  
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .svg-container {
                display: flex;
            }

            .card-text {
                margin-right: 20px;
                /* espace entre les deux éléments */
            }
        </style>
    </div>
    <script>
        var panier = []; 
    
        function ajouterAuPanier() {
    
            var nombreElementsPanier = panier.length;
            document.getElementById("cart-badge").textContent = nombreElementsPanier;
        }
    
        document.getElementById("bouton-ajouter-au-panier").addEventListener("click", function() {
            ajouterAuPanier();
        });
    </script>
    <br>
    <br>
    <br>
        <footer>
            @include('partials.footer')
        </footer>

