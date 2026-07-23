@extends('bilal-center.layout')

@section('title', 'Products')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-box mr-2 text-muted"></i>Products</h1>
            <div class="bc-subtitle">{{ $products->total() }} product{{ $products->total() === 1 ? '' : 's' }} in inventory</div>
        </div>
        <a href="{{ route('bilal-center.products.create') }}" class="btn btn-bc-primary">
            <i class="fas fa-plus mr-1"></i>Add Product
        </a>
    </div>

    <form action="{{ route('bilal-center.products.print-barcodes') }}" method="POST" target="_blank"
        onsubmit="return bcConfirmSelection(this)">
        @csrf
        <div class="bc-card">
            <div class="bc-toolbar">
                <form action="{{ route('bilal-center.products.index') }}" method="GET" class="bc-search">
                    <i class="fas fa-search"></i>
                    <input type="text" name="q" value="{{ $q }}" class="form-control"
                        placeholder="Search name, SKU, barcode, OEM, alias...">
                </form>
                <button type="submit" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-print mr-1"></i>Print Selected Barcodes
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width:2.5rem"></th>
                            <th>Shop Code</th>
                            <th>SKU</th>
                            <th>Barcode</th>
                            <th>Name (EN)</th>
                            <th>Name (UR)</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th class="text-right">Stock</th>
                            <th>Status</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td><input type="checkbox" name="product_ids[]" value="{{ $product->id }}"></td>
                                <td class="text-muted">{{ $product->shop_code }}</td>
                                <td><code>{{ $product->sku }}</code></td>
                                <td class="text-muted">{{ $product->barcode }}</td>
                                <td>
                                    <a href="{{ route('bilal-center.products.show', $product) }}" class="font-weight-600">
                                        {{ $product->name_en }}
                                    </a>
                                </td>
                                <td dir="rtl">{{ $product->name_ur }}</td>
                                <td>{{ optional($product->brand)->name }}</td>
                                <td>{{ optional($product->category)->name }}</td>
                                <td class="text-right">{{ $product->stock }}</td>
                                <td>
                                    @php
                                        $badgeClass = [
                                            'Active' => 'bc-badge-active',
                                            'Inactive' => 'bc-badge-inactive',
                                            'Out of Stock' => 'bc-badge-outofstock',
                                            'Discontinued' => 'bc-badge-discontinued',
                                        ][$product->status] ?? 'bc-badge-inactive';
                                    @endphp
                                    <span class="bc-badge {{ $badgeClass }}">{{ $product->status }}</span>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('bilal-center.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <button type="submit" form="delete-product-{{ $product->id }}" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted py-4">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    @foreach ($products as $product)
        <form id="delete-product-{{ $product->id }}" action="{{ route('bilal-center.products.destroy', $product) }}"
            method="POST" onsubmit="return confirm('Delete this product?')">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    {{ $products->links() }}
@endsection

@section('scripts')
    <script>
        function bcConfirmSelection(form) {
            if (form.querySelectorAll('input[name="product_ids[]"]:checked').length === 0) {
                alert('Please select at least one product');
                return false;
            }
            return true;
        }
    </script>
@endsection
