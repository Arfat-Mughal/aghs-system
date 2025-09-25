<!DOCTYPE html>
<html lang="en">
<head>
    {!! SEOMeta::generate() !!}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1672484806651208"
         crossorigin="anonymous"></script>
@include('includes.css')
</head>
<body>
@yield('content')
@include('includes.footer')
@include('includes.loader')
@include('includes.js')
</body>
</html>
