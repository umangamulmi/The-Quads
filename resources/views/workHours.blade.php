<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>POS</title>

    <!-- Styles -->
    <link href="{{ asset('css/clock.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

</head>
<body>
<div>
    <div class="home">
        <a class="btn" href="/"><i class="fa fa-sign-out icon-lg"></i>Go Home</a>
    </div>
    <div class="user-date">
        <i class="fa fa-user-circle-o icon-lg"></i><strong>{{$username}}</strong>
        <i class="fa fa-calendar icon-lg"></i><strong>{{$today}}</strong>
    </div>
    <div class="message-time">

    </div>
    <div id="clock" class="dark">
        <div class="display">
            <div class="weekdays"></div>
            <div class="ampm"></div>
            <div class="alarm"></div>
            <div class="digits"></div>
        </div>
    </div>

    <div class="button-holder">
        <button class="button" id="timeIn">Time In</button>
        <button class="button" id="timeOut">Time Out</button>
    </div>

</div>

</body>

<!-- JavaScript Includes -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment.min.js"></script>
<script src="{{asset('js/clock.js')}}"></script>
<script>
    var status = '{!! $status !!}';
    console.log(status);
</script>
</html>
