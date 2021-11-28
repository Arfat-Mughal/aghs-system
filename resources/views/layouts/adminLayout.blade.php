<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!-- Title Page-->
    <title>AGHS ADMIN-PANEL</title>

   @include('adminIncludes.css')
</head>

<body class="animsition">
<div class="page-wrapper">
    @include('adminIncludes.mobileHeader')
    @include('adminIncludes.sidebar')
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        @include("adminIncludes.header")
        <!-- MAIN CONTENT-->
            @yield('content')
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>
</div>
@include('sweetalert::alert')
@include("adminIncludes.js")


</body>

</html>
<!-- end document-->
