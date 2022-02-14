<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>LiqPay</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="/static/img/favicon.ico">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="//static.liqpay.ua/checkout/211109120553/styles/index.css">
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">

</head>

<body>
<div id="liqpay_checkout">
    <form method="POST" action="https://www.liqpay.ua/api/3/checkout" id = "formid"
          accept-charset="utf-8">
        <input type="hidden" name="data" value="{{$data}}"/>
        <input type="hidden" name="signature" value="{{$signature}}"/>

    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#formid').submit();
    });

</script>
<script src="//static.liqpay.ua/libjs/checkout.js" async></script>
<div class="container">
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>
