<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <style>
        .razorpay-payment-button {
            display: none
        }
    </style>
</head>
<script>
    $(window).on('load', function() {
        $('.razorpay-payment-button').click();
    });
</script>

<body>
    <p>processing payment don`t refresh back or press back button</p>
    <form action="/payment" method="get">
        {{-- @foreach ($event as $events) --}}
        <input type="text" name="eventcode" hidden value="{{ app('request')->input('eventcode') }}">
        <input type="text" name="name" hidden value="{{ app('request')->input('name') }}">
        <input type="text" name="email2" hidden value="{{ app('request')->input('email') }}">
        <input type="text" name="phone" hidden value="{{ app('request')->input('phone') }}">
        <input type="text" name="address" hidden value="{{ app('request')->input('address') }}">
        <input type="text" name="ticket_count" hidden value="{{ app('request')->input('ticketCount') }}">
        <input type="text" name="ticket_type" hidden value="{{ app('request')->input('ticket_type') }}">

        {{-- {{ app('request')->input('email') }} --}}
        <?php
        $ticket_type = $_POST['ticket_type'];
        $ticketcount = $_POST['ticketCount'];
        $dicount_percentage = 10;
        $total = 0;
        // echo $ticket_type;
        if ($ticket_type == 1) {
            $total = 599;
        } elseif ($ticket_type == 2) {
            $total = 2 * 599;

            $total = $total - 100;
        } elseif ($ticketcount >= 3) {
            $total = $ticketcount * 599;
            $discount = $total / $dicount_percentage;
            $total = $total - $discount;
        }
        // echo $total;

        $ftotal = $total * 100;
        // echo $total;
        // echo $ftotal;
        ?>
        @csrf
        <input type="text" hidden value="{{ $total }}" name="tamount">
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="rzp_test_pEA8ZqDJZPFcyG"
            data-amount="{{ $ftotal }}" data-currency="INR" data-buttontext="Book Your seat" data-name="Divyasrishti"
            data-description="Raasleela :- A Garba Night" data-image="https://divyasrishtievents.in/img/logo.png"
            data-prefill.name="name" data-prefill.email="" data-theme.color="#012652"></script>
        {{-- @endforeach --}}
    </form>
    </div>
</body>


</html>
