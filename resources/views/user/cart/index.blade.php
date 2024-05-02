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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    @yield('js')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    <section class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Product</th>
                    <th style="width:10%">Price</th>
                    <th style="width:8%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if(!empty($cart)) <!-- Vérifiez si le panier n'est pas vide -->
                @foreach($cart as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id="{{ $id }}">
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-3 hidden-xs">
                                        {{-- <img src="{{ asset('images') }}/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/> --}}
                                        @if(isset($details['image']))
                                            <img src="{{ asset('images') }}/{{ $details['image'] }}" width="100" height="100" class="img-responsive"/>
                                        @endif
                                    </div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin">{{ $details['product_name'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">${{ $details['price'] }}</td>
                            <td data-th="Quantity">
                                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                            </td>
                            <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" style="text-align:right;"><h3><strong>Total ${{ $total }}</strong></h3></td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align:right;">
                        <form action="/session" method="POST">
                        <a href="{{ url('/products') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                        </form>
                    </td>
                </tr>
            </tfoot>
        </table>
    </section>
            
        @section('scripts')
        <script type="text/javascript">
            
            $(".cart_update").change(function (e) {
                e.preventDefault();
            
                var ele = $(this);
            
                $.ajax({
                    url: '{{ route('update_cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id"), 
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function (response) {
                       window.location.reload();
                    }
                });
            });
            
            $(".cart_remove").click(function (e) {
                e.preventDefault();
            
                var ele = $(this);
            
                if(confirm("Do you really want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove_from_cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}', 
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
            
        </script>
</body>