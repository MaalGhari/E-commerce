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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!-- Scripts -->
    @yield('js')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
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
                <a class="navbar-brand" href="">
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
                                <a class="nav-link active" aria-current="page" href="{{ route('user.profile') }}"><svg viewBox="0 0 24 24" width="20px" height="20px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 18H9" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M21.6359 12.9579L21.3572 14.8952C20.8697 18.2827 20.626 19.9764 19.451 20.9882C18.2759 22 16.5526 22 13.1061 22H10.8939C7.44737 22 5.72409 22 4.54903 20.9882C3.37396 19.9764 3.13025 18.2827 2.64284 14.8952L2.36407 12.9579C1.98463 10.3208 1.79491 9.00229 2.33537 7.87495C2.87583 6.7476 4.02619 6.06234 6.32691 4.69181L7.71175 3.86687C9.80104 2.62229 10.8457 2 12 2C13.1543 2 14.199 2.62229 16.2882 3.86687L17.6731 4.69181C19.9738 6.06234 21.1242 6.7476 21.6646 7.87495" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.products.index') }}"><svg viewBox="0 0 24 24" width="20px" height="20px" id="_003_ECOMMERCE_03" data-name="003_ECOMMERCE_03" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>003_089</title><path d="M19,21H3a.99942.99942,0,0,1-1-1V4A.99942.99942,0,0,1,3,3H19a.99942.99942,0,0,1,1,1V5a1,1,0,0,1-2,0H4V19H18a1,1,0,0,1,2,0v1A.99942.99942,0,0,1,19,21Z" style="fill:#000000"></path><polygon points="9 4 9 10 11 8 13 10 13 4 9 4" style="fill:#000000"></polygon><path d="M19,16a1,1,0,0,1-.707-1.707L20.58594,12,18.293,9.707A.99989.99989,0,0,1,19.707,8.293L23.41406,12l-3.707,3.707A.99676.99676,0,0,1,19,16Z" style="fill:#000000"></path><path d="M21,13H14a1,1,0,0,1,0-2h7a1,1,0,0,1,0,2Z" style="fill:#000000"></path></g></svg>Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('send.email') }}"><svg version="1.1" width="20px" height="20px" id="Layer_1" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 64" enable-background="new 0 0 54 64" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Contact-book-2</title> <desc>Created with Sketch.</desc> <g id="Page-1" sketch:type="MSPage"> <g id="Contact-book-2" transform="translate(1.000000, 1.000000)" sketch:type="MSLayerGroup"> <path id="Shape_1_" sketch:type="MSShapeGroup" fill="none" stroke="#000000" stroke-width="2.2139999999999995" d="M47,7h3c1.1,0,2,0.9,2,2v8 c0,1.1-0.9,2-2,2h-3"></path> <path id="Shape_2_" sketch:type="MSShapeGroup" fill="none" stroke="#000000" stroke-width="2.2139999999999995" d="M47,24h3c1.1,0,2,0.9,2,2v8 c0,1.1-0.9,2-2,2h-3"></path> <path id="Shape_3_" sketch:type="MSShapeGroup" fill="none" stroke="#000000" stroke-width="2.2139999999999995" d="M47,41h3c1.1,0,2,0.9,2,2v8 c0,1.1-0.9,2-2,2h-3"></path> <path id="Shape" sketch:type="MSShapeGroup" fill="none" stroke="#000000" stroke-width="2.2139999999999995" d="M0,2c0-1.1,0.9-2,2-2h44 c1.1,0,2,0.9,2,2v58c0,1.1-0.9,2-2,2H2c-1.1,0-2-0.9-2-2V2L0,2z"></path> <path id="Shape_4_" sketch:type="MSShapeGroup" fill="none" stroke="#000000" stroke-width="2.2139999999999995" d="M6,3v56"></path> <path id="Shape_5_" sketch:type="MSShapeGroup" fill="none" stroke="#000000" stroke-width="2.2139999999999995" d="M20.8,38 c1.3-0.6,3.1-1.7,3.1-2.7c0-0.5-0.2-0.9-0.4-1c-2.5-1.4-2.9-5.8-3.1-5.8c-0.8,0-1.4-2.1-1.4-3.4c0-1.1,0.3-1.1,0.9-1.4v-0.2 c0-3.6,2.3-6.5,6-6.5s6.3,3,6.3,6.6v0.2c0.6,0.3,0.8,0.5,0.8,1.6c0,1.4-0.5,3.3-1.3,3.3c-0.2,0-0.8,4.3-3.2,5.7 c-0.2,0.1-0.4,0.3-0.4,0.8c0,1.2,1.9,2.2,3.2,2.8c1.6,0.8,8.7,1.5,8.7,9H11.9C11.9,39.5,18.8,39,20.8,38L20.8,38z"></path> </g> </g> </g></svg>Contact us</a>
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
                                            <i class="fa fa-shopping-cart" aria-hidden="true"><svg fill="#ffffff" height="30px" width="20px"  version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 91.692 91.692" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M72.332,13.083c-2.387,0-4.402,0.672-5.611,1.377l1.144,3.662c0.874-0.605,2.217-1.008,3.325-1.008 c1.68,0.066,2.453,0.84,2.453,2.016c0,1.143-0.875,2.219-1.949,3.494c-1.512,1.814-2.083,3.561-1.98,5.273l0.033,0.875h4.467 v-0.604c-0.033-1.512,0.471-2.822,1.715-4.201c1.275-1.408,2.854-3.09,2.854-5.643C78.782,15.536,76.766,13.083,72.332,13.083z"></path> <path d="M71.861,30.351c-1.747,0-2.99,1.277-2.99,3.057c0,1.746,1.21,3.057,2.99,3.057c1.814,0,3.023-1.311,3.023-3.057 C74.852,31.628,73.676,30.351,71.861,30.351z"></path> </g> <path d="M71.942,5.329c-9.074,0-16.718,6.156-19.021,14.508H45.23h-4.738H16.569l-1.395-6.892L1.246,10.62L0,18.089l8.785,1.463 l9.32,44.964l-4.092,13.011h5.658c-0.32,0.772-0.5,1.627-0.5,2.522c0,3.486,2.656,6.313,5.934,6.313 c3.278,0,5.932-2.826,5.932-6.313c0-0.896-0.18-1.75-0.496-2.522H61.83c-0.318,0.772-0.496,1.627-0.496,2.522 c0,3.486,2.654,6.313,5.932,6.313c3.275,0,5.933-2.826,5.933-6.313c0-0.896-0.181-1.75-0.498-2.522h5.017v-7.57H24.332l0.766-2.43 l53.035-22.192v-1.516c7.863-2.604,13.56-10.014,13.56-18.74C91.692,14.189,82.832,5.329,71.942,5.329z M71.942,38.829 c-7.582,0-13.75-6.168-13.75-13.75s6.168-13.75,13.75-13.75s13.75,6.168,13.75,13.75S79.524,38.829,71.942,38.829z"></path> </g> </g> </g></svg></i> Cart <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
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
                                <a class="nav-link" href="{{ route('welcome') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
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
        <div class="container">
    
            @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div> 
            @endif
            
            @yield('content')
        </div>
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col">
                    <form class="form-inline" action="/search" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="query" placeholder="Search...">
                            <div class="input-group-append">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            Filter
                        </button>
                        <ul class="dropdown-menu">
                            <input class="form-control" id="myInput" type="text" placeholder="Search..">
                            @foreach ($categories as $category)
                            <li><a href="{{ route('user.products.filter', ['query' => request()->input('query'), 'category' => $category->id]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    
        
    
        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $(".dropdown-menu li").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

        @if ($products && $products->count() > 0)
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4 mt-5">
                        <div class="card mb-3 h-100">
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="Product Image">
                            {{-- <img src="{{ asset('images') }}/{{$product->image }}" class="card-img-top" alt="Product Image"> --}}

        
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text">Price: ${{ $product->price }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('user.products.details', ['id' => $product->id]) }}"><svg viewBox="0 0 24 24" width="30px" height="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.83 9.17999C14.2706 8.61995 13.5576 8.23846 12.7813 8.08386C12.0049 7.92926 11.2002 8.00851 10.4689 8.31152C9.73758 8.61453 9.11264 9.12769 8.67316 9.78607C8.23367 10.4444 7.99938 11.2184 8 12.01C7.99916 13.0663 8.41619 14.08 9.16004 14.83" stroke="#4b8ace" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.01C13.0609 16.01 14.0783 15.5886 14.8284 14.8384C15.5786 14.0883 16 13.0709 16 12.01" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.61 6.39004L6.38 17.62C4.6208 15.9966 3.14099 14.0944 2 11.99C6.71 3.76002 12.44 1.89004 17.61 6.39004Z" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9994 3L17.6094 6.39" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.38 17.62L3 21" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5695 8.42999C20.4801 9.55186 21.2931 10.7496 21.9995 12.01C17.9995 19.01 13.2695 21.4 8.76953 19.23" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a>
                                    <a href="{{ route('add_to_cart', $product->id) }}"><svg viewBox="0 0 24 24" width="30px" height="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#ff8800" stroke-width="1.5"></path> <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#ff8800" stroke-width="1.5"></path> <path d="M13 13V11M13 11V9M13 11H15M13 11H11" stroke="#ff8800" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2 3L2.26121 3.09184C3.5628 3.54945 4.2136 3.77826 4.58584 4.32298C4.95808 4.86771 4.95808 5.59126 4.95808 7.03836V9.76C4.95808 12.7016 5.02132 13.6723 5.88772 14.5862C6.75412 15.5 8.14857 15.5 10.9375 15.5H12M16.2404 15.5C17.8014 15.5 18.5819 15.5 19.1336 15.0504C19.6853 14.6008 19.8429 13.8364 20.158 12.3075L20.6578 9.88275C21.0049 8.14369 21.1784 7.27417 20.7345 6.69708C20.2906 6.12 18.7738 6.12 17.0888 6.12H11.0235M4.95808 6.12H7" stroke="#ff8800" stroke-width="1.5" stroke-linecap="round"></path> </g></svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @else
            <p>No product is available at the moment.</p>
        @endif
        
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-sm">
                    @if ($products->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a></li>
                    @endif
            
                    @foreach ($products as $page)
                        @if ($page->url)
                            <li class="page-item {{ $page->isActive ? 'active' : '' }}"><a class="page-link" href="{{ $page->url }}">{{ $page->label }}</a></li>
                        @endif
                    @endforeach
            
                    @if ($products->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
    <footer>
        @include('partials.footer')
    </footer>














    {{-- <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col">
                <form class="form-inline" action="/search" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="Search...">
                        <div class="input-group-append">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Filter
                    </button>
                    <ul class="dropdown-menu">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                        @foreach ($categories as $category)
                        <li><a href="{{ route('user.products.filter', ['query' => request()->input('query'), 'category' => $category->id]) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 mt-5">
                <div class="card mb-3">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="Product Image">

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Price: ${{ $product->price }}</p>
                        <a href="{{ route('user.products.details', ['id' => $product->id]) }}"><svg viewBox="0 0 24 24" width="30px" height="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.83 9.17999C14.2706 8.61995 13.5576 8.23846 12.7813 8.08386C12.0049 7.92926 11.2002 8.00851 10.4689 8.31152C9.73758 8.61453 9.11264 9.12769 8.67316 9.78607C8.23367 10.4444 7.99938 11.2184 8 12.01C7.99916 13.0663 8.41619 14.08 9.16004 14.83" stroke="#4b8ace" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.01C13.0609 16.01 14.0783 15.5886 14.8284 14.8384C15.5786 14.0883 16 13.0709 16 12.01" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.61 6.39004L6.38 17.62C4.6208 15.9966 3.14099 14.0944 2 11.99C6.71 3.76002 12.44 1.89004 17.61 6.39004Z" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9994 3L17.6094 6.39" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.38 17.62L3 21" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5695 8.42999C20.4801 9.55186 21.2931 10.7496 21.9995 12.01C17.9995 19.01 13.2695 21.4 8.76953 19.23" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a>
                        <a href=""><svg viewBox="0 0 24 24" width="30px" height="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z" stroke="#ff8800" stroke-width="1.5"></path> <path d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z" stroke="#ff8800" stroke-width="1.5"></path> <path d="M13 13V11M13 11V9M13 11H15M13 11H11" stroke="#ff8800" stroke-width="1.5" stroke-linecap="round"></path> <path d="M2 3L2.26121 3.09184C3.5628 3.54945 4.2136 3.77826 4.58584 4.32298C4.95808 4.86771 4.95808 5.59126 4.95808 7.03836V9.76C4.95808 12.7016 5.02132 13.6723 5.88772 14.5862C6.75412 15.5 8.14857 15.5 10.9375 15.5H12M16.2404 15.5C17.8014 15.5 18.5819 15.5 19.1336 15.0504C19.6853 14.6008 19.8429 13.8364 20.158 12.3075L20.6578 9.88275C21.0049 8.14369 21.1784 7.27417 20.7345 6.69708C20.2906 6.12 18.7738 6.12 17.0888 6.12H11.0235M4.95808 6.12H7" stroke="#ff8800" stroke-width="1.5" stroke-linecap="round"></path> </g></svg></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination pagination-sm">
                @if ($products->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a></li>
                @endif
        
                @foreach ($products as $page)
                    @if ($page->url)
                        <li class="page-item {{ $page->isActive ? 'active' : '' }}"><a class="page-link" href="{{ $page->url }}">{{ $page->label }}</a></li>
                    @endif
                @endforeach
        
                @if ($products->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                @endif
            </ul>
        </nav>
    </div> 
    
    <footer>
        @include('partials.footer')
    </footer>
    
</div> --}}
