<!DOCTYPE html>
<html lang="en" translate="no">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bilal Center') - Bilal Mobile & Collection Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate">
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
                <ul class="navbar-nav ml-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.products.index') }}"><i class="fas fa-box mr-1"></i>Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.browse.categories') }}"><i class="fas fa-sitemap mr-1"></i>Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('bilal-center.browse.bike-models') }}"><i class="fas fa-motorcycle mr-1"></i>Bike Models</a></li>
                    @php $bcCartCount = collect(session('bilal_center.cart', []))->sum(); @endphp
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bilal-center.cart.index') }}">
                            <i class="fas fa-shopping-cart mr-1"></i>Cart
                            @if ($bcCartCount) <span class="badge badge-light">{{ $bcCartCount }}</span> @endif
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="bcManageDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cog mr-1"></i>Manage
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bcManageDropdown">
                            <a class="dropdown-item" href="{{ route('bilal-center.brands.index') }}"><i class="fas fa-tags mr-2 text-muted"></i>Brands</a>
                            <a class="dropdown-item" href="{{ route('bilal-center.categories.index') }}"><i class="fas fa-sitemap mr-2 text-muted"></i>Categories</a>
                            <a class="dropdown-item" href="{{ route('bilal-center.bike-models.index') }}"><i class="fas fa-motorcycle mr-2 text-muted"></i>Bike Models</a>
                            <a class="dropdown-item" href="{{ route('bilal-center.suppliers.index') }}"><i class="fas fa-truck mr-2 text-muted"></i>Suppliers</a>
                        </div>
                    </li>
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
