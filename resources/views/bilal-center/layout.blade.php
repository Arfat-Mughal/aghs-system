<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bilal Center') - Bilal Mobile & Collection Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
    <link href="{{ asset('admin_assets/css/bilal-center.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bc-navbar">
        <div class="container-fluid" style="max-width:1200px;">
            <a class="navbar-brand" href="{{ route('bilal-center.products.index') }}">
                <i class="fas fa-motorcycle"></i>Bilal Center
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bcNavbarLinks">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="bcNavbarLinks">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.products.index') }}"><i class="fas fa-box mr-1"></i>Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.brands.index') }}"><i class="fas fa-tags mr-1"></i>Brands</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.categories.index') }}"><i class="fas fa-sitemap mr-1"></i>Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.bike-models.index') }}"><i class="fas fa-motorcycle mr-1"></i>Bike Models</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.suppliers.index') }}"><i class="fas fa-truck mr-1"></i>Suppliers</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid bc-content">
        @if (session('success'))
            <div class="alert alert-success bc-alert">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>

    <script src="{{ asset('admin_assets/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable({ paging: false, info: false, lengthChange: false });
        });
    </script>
    @include('sweetalert::alert')
    @yield('scripts')
</body>
</html>
