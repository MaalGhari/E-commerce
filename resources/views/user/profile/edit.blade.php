@extends('layouts.app')

@section('content')

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

@endsection
