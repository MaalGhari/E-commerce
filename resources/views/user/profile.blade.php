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
    </div>
    <br>
    <br>
    <br>
    <footer>
        @include('partials.footer')
    </footer>