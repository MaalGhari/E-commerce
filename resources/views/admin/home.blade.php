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
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/cards/card-1/assets/css/card-1.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/charts/chart-4/assets/css/chart-4.css">

    <!-- Scripts -->
    @yield('js')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://unpkg.com/bs-brain@2.0.3/components/charts/chart-4/assets/controller/chart-4.js"></script>

    <style>
        /* Style the input field */
        #myInput {
            padding: 20px;
            margin-top: -6px;
            border: 0;
            border-radius: 0;
            background: #f1f1f1;
        }

        .text-16 {
          font-size: 20px;
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
                            <a class="nav-link active" aria-current="page" href="{{ route('admin.dashboard.home') }}">Home</a>
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
            <div class="card mt-5">    
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
    
<!-- Chart 4 - Bootstrap Brain Component -->
{{-- <section class="py-3 py-md-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
          <div class="card widget-card border-light shadow-sm">
            <div class="card-body p-4">
              <div class="d-block d-sm-flex align-items-center justify-content-between mb-3">
                <div class="mb-3 mb-sm-0">
                  <h5 class="card-title widget-card-title">Department Sales</h5>
                </div>
                <div>
                  <select class="form-select text-secondary border-light-subtle">
                    <option value="1">April 2024</option>
                    <option value="2">May 2024</option>
                    <option value="3">June 2024</option>
                    <option value="4">July 2024</option>
                  </select>
                </div>
              </div>
              <div id="bsb-chart-4"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section> --}}

    @php
      $productStats = app(\App\Http\Controllers\Admin\AdminProductController::class)->getProductStatistics();
      $userStats = app(\App\Http\Controllers\Admin\AdminProfileController::class)->getUserStatistics();
      $promotionStats = app(\App\Http\Controllers\Admin\AdminPromotionController::class)->getPromotionStatistics();
      $categoryStats = app(\App\Http\Controllers\Admin\AdminCategoryController::class)->getCategoryStatistics();
    @endphp

    <br>

    <div class="container">
      <div class="row justify-content-center">
          <!-- First Stats Container -->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
              <div class="card h-100">
                  <div class="card-header bg-warning text-white text-center text-16 font-weight-bold py-3">
                      Users
                  </div>
                  <div class="card-body py-5">
                      <p class="card-text text-3xl font-bold">Total users <span class="card-text text-warning">{{ $userStats['totalUsers'] }}</span></p>
                  </div>
              </div>
          </div>
  
          <!-- Second Stats Container -->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
              <div class="card h-100">
                  <div class="card-header bg-success text-white text-center text-16 font-weight-bold py-3">
                      Categories
                  </div>
                  <div class="card-body py-5">
                      <p class="card-text text-3xl font-bold">Total categories <span class="card-text text-success">{{ $categoryStats['totalCategories'] }}</span></p>
                  </div>
              </div>
          </div>
  
          <!-- Third Stats Container for PRODUCTS -->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
              <div class="card h-100">
                  <div class="card-header bg-info text-white text-center text-16 font-weight-bold py-3">
                      Products
                  </div>
                  <div class="card-body py-5">
                      <p class="card-text text-3xl font-bold">Total products <span class="card-text text-info">{{ $productStats['totalProducts'] }}</span></p>
                  </div>
              </div>
          </div>
  
          <!-- Fourth Stats Container for PROMOTIONS -->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
              <div class="card h-100">
                  <div class="card-header bg-primary text-white text-center text-16 font-weight-bold py-3">
                      Promotions
                  </div>
                  <div class="card-body py-5">
                      <p class="card-text text-3xl font-bold">Total promotions <span class="card-text text-primary">{{ $promotionStats['totalPromotions'] }}</span></p>
                  </div>
              </div>
          </div>

          <!-- Fifth Stats Container for PRODUCTS -->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header bg-danger text-white text-center text-16 font-weight-bold py-3">
                    Product Stats
                </div>
                <div class="card-body py-5">
                  <p class="card-text text-3xl font-bold">Products created this Month <span class="card-text text-danger">{{ $productStats['productsCreatedThisMonth'] }}</span></p>
                  <p class="card-text text-3xl font-bold">Products created last Week <span class="card-text text-danger">{{ $productStats['productsCreatedLastWeek'] }}</span></p>
                  <p class="card-text text-3xl font-bold">Products updated Today <span class="card-text text-danger">{{ $productStats['productsUpdatedToday'] }}</span></p>
                  <p class="card-text text-3xl font-bold">Products deleted this Month <span class="card-text text-danger">{{ $productStats['productsDeletedThisMonth'] }}</span></p>
                </div>                
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

  {{-- <div class="container">
    👋🏼 Welcome back! in your dashboard 
    @if (Auth::guard('admin')->user()->gender == 'male')
        Mr.
    @else
        Mrs.
    @endif
    {{Auth::guard('admin')->user()->name}} 
    <br> 
    <br>
    📬 Your email address is {{Auth::guard('admin')->user()->email}}
  </div> --}}

