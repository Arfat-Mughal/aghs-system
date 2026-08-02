@extends('bilal-center.layout')

@section('title', 'Low Stock')

@section('content')
    <style>
        @media print {
            .bc-navbar, .bc-toolbar, .bc-page-header a, .no-print { display: none !important; }
            .bc-card { border: none !important; box-shadow: none !important; }
        }
    </style>

    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-exclamation-triangle mr-2 text-muted"></i>Low Stock</h1>
            <div class="bc-subtitle">{{ $products->count() }} product{{ $products->count() === 1 ? '' : 's' }} at or below minimum stock</div>
        </div>
        <div class="no-print">
            <a href="{{ route('bilal-center.products.index') }}" class="btn btn-outline-secondary mr-2">
                <i class="fas fa-arrow-left mr-1"></i>Back to Products
            </a>
            <button type="button" class="btn btn-bc-primary" onclick="window.print()">
                <i class="fas fa-print mr-1"></i>Print Buy List
            </button>
        </div>
    </div>

    <div class="bc-card no-print">
        <div class="bc-card-body">
            <form action="{{ route('bilal-center.products.low-stock') }}" method="GET" class="form-row align-items-end">
                <div class="col-auto">
                    <label class="small text-muted mb-1">Brand</label>
                    <select name="brand_id" class="form-control">
                        <option value="">All Brands</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label class="small text-muted mb-1">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <label class="small text-muted mb-1">Supplier</label>
                    <select name="supplier_id" class="form-control">
                        <option value="">All Suppliers</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-bc-primary">
                        <i class="fas fa-filter mr-1"></i>Filter
                    </button>
                    @if (request()->hasAny(['brand_id', 'category_id', 'supplier_id']))
                        <a href="{{ route('bilal-center.products.low-stock') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times mr-1"></i>Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="bc-card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Name (EN)</th>
                        <th>Name (UR)</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th class="text-right">Stock</th>
                        <th class="text-right">Minimum</th>
                        <th class="text-right">To Buy</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name_en }}</td>
                            <td dir="rtl">{{ $product->name_ur }}</td>
                            <td>{{ optional($product->brand)->name }}</td>
                            <td>{{ optional($product->category)->name }}</td>
                            <td>{{ optional($product->supplier)->name }}</td>
                            <td class="text-right">{{ $product->stock }}</td>
                            <td class="text-right">{{ $product->minimum_stock }}</td>
                            <td class="text-right font-weight-600">
                                {{ max(max($product->minimum_stock, \App\Models\BilalCenter\Product::LOW_STOCK_FALLBACK) - $product->stock, 0) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">Nothing is low on stock right now.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
