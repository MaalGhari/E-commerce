@extends('admin.layouts.app')

@section('content')

    Welcome in your dashboard : {{Auth::guard('admin')->user()->name}} and your email address : {{Auth::guard('admin')->user()->email}}

@endsection