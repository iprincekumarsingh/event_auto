<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>

</head>

<body>

    <form action="/payment" method="get">
        <input type="text" value="{{$events->event_id}}">
        @foreach ($event as $events)

        @csrf
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_live_uHrDPumBAZOWYB"
            data-amount="{{$events['amount'] *100}}" data-currency="INR" data-buttontext="Book Your seat"
            data-name="Programming Solutions" data-description="Rozerpay" data-image="{{url('img/logo.png')}}"
            data-prefill.name="name" data-prefill.email="me@princekumarsingh.tech" data-theme.color="#F37254"></script>
        @endforeach
    </form>
    </div>
</body>

</html>
