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

        .btn-light-blue {
            background-color: #a9bdec; 
            color: #192ea9; 
        }

        .btn-light-red {
            background-color: #f8d7da; 
            color: #721c24; 
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
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('admin.dashboard.home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard.admin.products.index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard.categories.index') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard.promotions.index') }}">Promotions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('admin')->user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.dashboard.users.edit-profile') }}">
                                    My Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('admin.dashboard.users.list') }}">
                                    List Users
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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Dashboard') }}</div> --}}

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5" id="app">    
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="container">
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
                                <li><a href="{{ route('admin.dashboard.admin.products.filter', ['query' => request()->input('query'), 'category' => $category->id]) }}">{{ $category->name }}</a></li>
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

            <div style="text-align: center;" class="mt-5">
                <a href="{{ route('admin.dashboard.admin.products.create') }}" class="btn btn-warning" style="display: inline-block; color: #ffffff;">
                    <svg viewBox="0 0 24 24" width="30px" height="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 14H12M12 14H14M12 14V16M12 14V12" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 11.7979C22 9.16554 22 7.84935 21.2305 6.99383C21.1598 6.91514 21.0849 6.84024 21.0062 6.76946C20.1506 6 18.8345 6 16.2021 6H15.8284C14.6747 6 14.0979 6 13.5604 5.84678C13.2651 5.7626 12.9804 5.64471 12.7121 5.49543C12.2237 5.22367 11.8158 4.81578 11 4L10.4497 3.44975C10.1763 3.17633 10.0396 3.03961 9.89594 2.92051C9.27652 2.40704 8.51665 2.09229 7.71557 2.01738C7.52976 2 7.33642 2 6.94975 2C6.06722 2 5.62595 2 5.25839 2.06935C3.64031 2.37464 2.37464 3.64031 2.06935 5.25839C2 5.62595 2 6.06722 2 6.94975M21.9913 16C21.9554 18.4796 21.7715 19.8853 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V11" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>  
                    Add products
                </a>
            </div>

            @if ($products && $products->count() > 0)
                <div class="container">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4 mt-5">
                            <div class="card mb-3 h-100">
                                <a href="{{ route('admin.dashboard.admin.products.details', ['id' => $product->id]) }}"><svg viewBox="0 0 24 24" width="30px" height="30px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M14.83 9.17999C14.2706 8.61995 13.5576 8.23846 12.7813 8.08386C12.0049 7.92926 11.2002 8.00851 10.4689 8.31152C9.73758 8.61453 9.11264 9.12769 8.67316 9.78607C8.23367 10.4444 7.99938 11.2184 8 12.01C7.99916 13.0663 8.41619 14.08 9.16004 14.83" stroke="#4b8ace" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 16.01C13.0609 16.01 14.0783 15.5886 14.8284 14.8384C15.5786 14.0883 16 13.0709 16 12.01" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M17.61 6.39004L6.38 17.62C4.6208 15.9966 3.14099 14.0944 2 11.99C6.71 3.76002 12.44 1.89004 17.61 6.39004Z" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M20.9994 3L17.6094 6.39" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6.38 17.62L3 21" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M19.5695 8.42999C20.4801 9.55186 21.2931 10.7496 21.9995 12.01C17.9995 19.01 13.2695 21.4 8.76953 19.23" stroke="#4780bd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a>

                                <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text">Price: ${{ $product->price }}</p>
                                    {{-- <div style="text-align: right;">
                                        <a href="{{ route('admin.dashboard.admin.products.update', ['id' => $product->id]) }}"><svg viewBox="0 0 24 24" width="25px" height="25px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H9M15 5H17C18.1046 5 19 5.89543 19 7V9" stroke="#1e14a9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14.902 20.3343L12.7153 20.7716L13.1526 18.585C13.1914 18.3914 13.2865 18.2136 13.4261 18.074L17.5 14L19.5 12L21.4869 13.9869L19.4869 15.9869L15.413 20.0608C15.2734 20.2004 15.0956 20.2956 14.902 20.3343Z" stroke="#1e14a9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#1e14a9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a>
                                        <a href="{{ route('admin.dashboard.admin.products.destroy', ['id' => $product->id]) }}"><svg viewBox="0 0 24 24" width="25px" height="25px" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 11V17" stroke="#fc0303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 11V17" stroke="#fc0303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#db1414" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#fc0303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#fc0303" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a>
                                    </div> --}}
                                    <div class=" text-center">
                                        <form action="{{ route('admin.dashboard.admin.products.edit', $product->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('GET')
                                            <button type="submit" class="btn btn-primary btn-light-blue">Edit</button>
                                        </form>
                                        <form action="{{ route('admin.dashboard.admin.products.delete', $product->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-light-red">Delete</button>
                                        </form>
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