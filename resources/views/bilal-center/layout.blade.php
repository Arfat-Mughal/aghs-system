<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bilal Center') - Bilal Mobile & Collection Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
    <style>
        body { background: #f4f6f9; }
        .bc-navbar { margin-bottom: 20px; }
        .bc-content { padding: 20px 0 60px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bc-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('bilal-center.products.index') }}">Bilal Center</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bcNavbarLinks">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="bcNavbarLinks">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.products.index') }}">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.brands.index') }}">Brands</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.categories.index') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.bike-models.index') }}">Bike Models</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.suppliers.index') }}">Suppliers</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid bc-content">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>

    <script src="{{ asset('admin_assets/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script>
    @include('sweetalert::alert')
    @yield('scripts')
</body>
</html>
