<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bilal Center') - Bilal Mobile & Collection Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}">
    <style>
        :root {
            --bc-primary: #4f46e5;
            --bc-primary-dark: #4338ca;
            --bc-ink: #1e2433;
            --bc-ink-soft: #6b7280;
            --bc-bg: #f3f4f8;
            --bc-border: #e5e7eb;
        }

        body {
            background: var(--bc-bg);
            color: var(--bc-ink);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }

        .bc-navbar {
            background: var(--bc-ink) !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .15);
            padding-top: .75rem;
            padding-bottom: .75rem;
        }

        .bc-navbar .navbar-brand {
            font-weight: 700;
            letter-spacing: .02em;
        }

        .bc-navbar .navbar-brand i {
            color: var(--bc-primary);
            margin-right: .4rem;
        }

        .bc-navbar .nav-link {
            font-weight: 500;
            padding: .5rem 1rem !important;
            border-radius: .375rem;
        }

        .bc-navbar .nav-link:hover,
        .bc-navbar .nav-item.active .nav-link {
            background: rgba(255, 255, 255, .08);
            color: #fff !important;
        }

        .bc-content {
            padding: 2rem 0 4rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .bc-page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: .75rem;
            margin-bottom: 1.5rem;
        }

        .bc-page-header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .bc-page-header .bc-subtitle {
            color: var(--bc-ink-soft);
            font-size: .875rem;
            margin-top: .15rem;
        }

        .bc-card {
            background: #fff;
            border: 1px solid var(--bc-border);
            border-radius: .6rem;
            box-shadow: 0 1px 2px rgba(16, 24, 40, .04);
            margin-bottom: 1.5rem;
        }

        .bc-card-body {
            padding: 1.25rem 1.5rem;
        }

        .bc-toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: .75rem;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--bc-border);
        }

        .bc-search {
            position: relative;
            flex: 1;
            min-width: 240px;
            max-width: 420px;
        }

        .bc-search i {
            position: absolute;
            left: .9rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--bc-ink-soft);
        }

        .bc-search input {
            padding-left: 2.25rem;
            border-radius: .5rem;
        }

        .btn-bc-primary {
            background: var(--bc-primary);
            border-color: var(--bc-primary);
            color: #fff;
            font-weight: 600;
            border-radius: .5rem;
        }

        .btn-bc-primary:hover {
            background: var(--bc-primary-dark);
            border-color: var(--bc-primary-dark);
            color: #fff;
        }

        .btn, .form-control, .custom-select {
            border-radius: .5rem;
        }

        .table thead th {
            background: #f9fafb;
            color: var(--bc-ink-soft);
            font-size: .78rem;
            text-transform: uppercase;
            letter-spacing: .04em;
            font-weight: 700;
            border-bottom: 1px solid var(--bc-border);
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f6fb;
        }

        .bc-badge {
            display: inline-block;
            padding: .3em .65em;
            font-size: .75rem;
            font-weight: 600;
            border-radius: 999px;
        }

        .font-weight-600 { font-weight: 600; }
        .font-weight-700 { font-weight: 700; }

        .bc-badge-active { background: #ecfdf3; color: #027a48; }
        .bc-badge-inactive { background: #f2f4f7; color: #667085; }
        .bc-badge-outofstock { background: #fff4e5; color: #b54708; }
        .bc-badge-discontinued { background: #fef3f2; color: #b42318; }

        .bc-alert {
            border: none;
            border-radius: .5rem;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: .5rem;
            border: 1px solid var(--bc-border);
            padding: .25rem .5rem;
        }
    </style>
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
