@extends('admin.layouts.app')

@section('content')
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
    
</div>
@endsection

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

