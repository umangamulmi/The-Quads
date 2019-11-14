<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POS</title>

    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">
    <link href="{{ asset('css/cashRegister/cashRegister.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

</head>
<body>
<div class="cash-register">
    <header class="title-bar">
        <a class="go-home" href="/">
            <i class="fa fa-sign-out icon-lg"></i>
            Go Home
        </a>
        <span class="text">Cash Register</span>
        <div class="date-info">
            <span class="username">{{$username}}</span>
            <span class="today"> &mdash; {{$today}}</span></div>
    </header>
    <div class="body">
        <div class="added-item">
            <div class="input-group">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input id="customer-name" type="text" class="form-control input-customer"
                       placeholder="Add a Customer Name">
            </div>
            <div class="container">
                <ul class="list-group" id ="add-list-group">
                </ul>
            </div>
            <hr>
            <div class="total-amount">
                <span>Total Amount:</span>
                <span id="added-cash"></span>
            </div>
            <hr>
            <div class="added-btn-group">
                <button type="button" class="btn btn-danger" id="added-clear-all">Clear All</button>
                <button type="button" class="btn btn-success" id="sale-transaction">Transaction</button>
            </div>
        </div>
        <div class="product-list">
            @foreach($products as $key => $product)
                <div class="item" id="{{$product->id}}" key="{{$key}}">
                    <p class="text">{{$product->name}}</p>
                </div>
            @endforeach
        </div>
        <div class="customer-enter-cash">
            <div class="input-group">
                <i class="fa fa-dollar" aria-hidden="true"></i>
                <input id="customer-cash" type="text" class="form-control input-customer"
                       placeholder="Total Cash Given by Customer" readonly>
            </div>
            <div class="cash-btn-group">
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info btn-lg" value="7">7</button>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info" value="8">8</button>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info" value="9">9</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info btn-lg" value="4">4</button>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info" value="5">5</button>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info" value="6">6</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info btn-lg" value="1">1</button>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info" value="2">2</button>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info" value="3">3</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info btn-lg" value=".">.</button>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info" value="0">0</button>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <button type="button" class="btn btn-info" value="CE">CE</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="customer-cash-btn-group">
                <button type="button" class="btn btn-danger" id="clear-customer-cash">Clear</button>
                <button type="button" class="btn btn-success" id="enter-customer-cash">Enter</button>
            </div>
            <hr>
            <div class="total-amount">
                <span>Change Due:</span>
                <span id="change-due-cash"></span>
            </div>
        </div>
    </div>

</div>
</div>

<!-- JavaScript Includes -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment.min.js"></script>
<script src="{{asset('js/cashRegister.js')}}"></script>
<script>
    var products = JSON.parse('{!! $products !!}');
    var added_products = [];
    var added_cash = 0;
    var customer_cash = 0;
    var change_due_cash = 0;
</script>

</body>

</html>
