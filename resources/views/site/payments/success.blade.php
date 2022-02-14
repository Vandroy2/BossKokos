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
<h1>Success</h1>

<script>
    // $(document).ready(function(){
    //     $('#formid').submit();
    // });
    window.LiqPayCheckoutCallback = function () {
        LiqPayCheckout.init({
        }).on("liqpay.callback", function (data) {
            console.log(data.status);
            console.log(data);
        }).on("liqpay.ready", function (data) {
            // ready
        }).on("liqpay.close", function (data) {
            // close
        });
    };
</script>
</body>
