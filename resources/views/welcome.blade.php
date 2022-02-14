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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

    <body>
        <div class="main_container">
            <div class="buttons_container">
                <form method="POST" action="{{route('payments.create')}}"
                      accept-charset="utf-8">
                    @csrf
                    <input type="hidden" name="amount" value="50">
                    <button class = "btn btn-success main_button">Пожертвовать 50 грн.</button>
                </form>
                <form method="POST" action="{{route('payments.create')}}"
                      accept-charset="utf-8">
                    @csrf
                    <input type="hidden" name="amount" value="100">
                    <button class = "btn btn-success main_button">Пожертвовать 100 грн.</button>
                </form>
                <form method="POST" action="{{route('payments.create')}}"
                      accept-charset="utf-8">
                    @csrf
                    <input type="hidden" name="amount" value="500">
                    <button class = "btn btn-success main_button">Пожертвовать 500 грн.</button>
                </form>

                <form action="{{route('payments.create')}}" method = "POST">
                    @csrf
                    <button type="button" class = "main_text_container">
                        <input type="submit" class="main_text" value="Пожертвовать">
                        <input class = "main_input" type="text" name="amount" id="amount">
                    </button>
                </form>
            </div>
        </div>




    </body>

</html>
