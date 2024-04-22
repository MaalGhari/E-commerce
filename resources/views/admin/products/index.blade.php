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

    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4 mt-5">
                <div class="card mb-3">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="Product Image">
                    {{-- {{ dd($product->image) }} --}}

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Price: ${{ $product->price }}</p>
                        <a href="{{ route('admin.dashboard.admin.products.details', ['id' => $product->id]) }}">view details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
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
@endsection

<footer>
    @include('partials.footer')
</footer>