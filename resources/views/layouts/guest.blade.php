<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('web_assets/css/open-iconic-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('web_assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('web_assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('web_assets/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('web_assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('web_assets/css/aos.css')}}">
        <link rel="stylesheet" href="{{asset('web_assets/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('web_assets/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('web_assets/css/icomoon.css')}}">
        <link rel="stylesheet" href="{{asset('web_assets/css/style.css')}}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-6 col-lg-5">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
