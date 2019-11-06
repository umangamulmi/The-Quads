<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href={{ asset('css/bootstrap-pincode-input.css') }} rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <style>
        html, body {
            background-color: #e1e1e160;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
<div class="first-page">
    <div class="content">
        <div class="title">
            <img src="{{asset('img/logo.png')}}" alt="logo">
            The Quads Point of sale system
        </div>
        <div class="panel">
            <div class="clock">
                <button
                        type="button"
                        data-target="#pincodeModal"
                        data-toggle="modal"
                        data-title="Employee Clock In/Out">
                    <img src="{{asset('img/clock_in_out.png')}}" alt="Clock">
                </button>
                <div class="text">Employee Clock In/Out</div>
            </div>
            <div class="cash-register">
                <button
                        type="button"
                        data-target="#pincodeModal"
                        data-toggle="modal"
                        data-title="Cash Register">
                    <img src="{{asset('img/cash_register.png')}}" alt="Cash Register">
                </button>
                <div class="text">Cash Register</div>
            </div>
            <div class="administrator">
                <button
                        type="button"
                        data-target="#pincodeModal"
                        data-toggle="modal"
                        data-title="Administrator Control">
                    <img src="{{asset('img/administrator.png')}}" alt="Administrator Control">
                </button>
                <div class="text">Administrator Control</div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pincodeModal"
         tabindex="-1" role="dialog"
         aria-labelledby="pincodeModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div style="margin-right:auto; visibility: hidden">Hidden</div>
                    <h4 class="modal-title" style="color: #165321; font-weight: bold"
                        id="pincodeModalLabel"></h4>
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <p>
                        <b>Please enter your pincode</b>
                    </p>
                    <div>
                        <input type="number" id="pincode" value="" autofocus>
                    </div>
                    <div class="pin-status">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">Close
                    </button>
                    <span class="pull-right">
                      <button type="button" class="btn btn-primary" id="btn-pinConfirm">
                        Confirm
                      </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script src="{{ asset('js/app.js') }}"></script>
<script src={{ asset('js/bootstrap-pincode-input.js') }}></script>

</html>
