@extends('bilal-center.layout')

@section('title', 'Products')

@section('content')
    <div class="row mb-3">
        <div class="col-md-8">
            <form action="{{ route('bilal-center.products.index') }}" method="GET" class="form-inline">
                <input type="text" name="q" value="{{ $q }}" class="form-control mr-2" style="width: 300px"
                    placeholder="Search name, SKU, barcode, OEM, alias...">
                <button type="submit" class="btn btn-secondary">Search</button>
            </form>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('bilal-center.products.create') }}" class="btn btn-primary">Add Product</a>
        </div>
    </div>

    <form action="{{ route('bilal-center.products.print-barcodes') }}" method="POST" target="_blank"
        onsubmit="return bcConfirmSelection(this)">
        @csrf
        <div class="mb-2">
            <button type="submit" class="btn btn-outline-secondary btn-sm">Print Selected Barcodes</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped bg-white">
                <thead>
                    <tr>
                        <th></th>
                        <th>Shop Code</th>
                        <th>SKU</th>
                        <th>Barcode</th>
                        <th>Name (EN)</th>
                        <th>Name (UR)</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td><input type="checkbox" name="product_ids[]" value="{{ $product->id }}"></td>
                            <td>{{ $product->shop_code }}</td>
                            <td>{{ $product->sku }}</td>
                            <td>{{ $product->barcode }}</td>
                            <td><a href="{{ route('bilal-center.products.show', $product) }}">{{ $product->name_en }}</a></td>
                            <td>{{ $product->name_ur }}</td>
                            <td>{{ optional($product->brand)->name }}</td>
                            <td>{{ optional($product->category)->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->status }}</td>
                            <td>
                                <a href="{{ route('bilal-center.products.edit', $product) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('bilal-center.products.destroy', $product) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </form>

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
