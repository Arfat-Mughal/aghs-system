@extends('bilal-center.layout')

@section('title', $product->name_en)

@section('content')
    <a href="{{ route('bilal-center.products.index') }}">&larr; Back to Products</a>
    <div class="card mt-2">
        <div class="card-body">
            <h3>{{ $product->name_en }} @if($product->name_ur) <small dir="rtl">({{ $product->name_ur }})</small> @endif</h3>

            @if ($product->images->isNotEmpty())
                <div class="row mb-3">
                    @foreach ($product->images as $image)
                        <div class="col-md-2">
                            <img src="{{ asset('storage/' . $image->image) }}" class="img-thumbnail">
                        </div>
                    @endforeach
                </div>
            @endif

            <table class="table table-bordered">
                <tr><th>SKU</th><td>{{ $product->sku }}</td></tr>
                <tr><th>Barcode</th><td>{{ $product->barcode }}</td></tr>
                <tr><th>OEM Number</th><td>{{ $product->oem_number }}</td></tr>
                <tr><th>Shop Code</th><td>{{ $product->shop_code }}</td></tr>
                <tr><th>Brand</th><td>{{ optional($product->brand)->name }}</td></tr>
                <tr><th>Category</th><td>{{ optional($product->category)->name }}</td></tr>
                <tr><th>Selling Price</th><td>{{ $product->selling_price }}</td></tr>
                <tr><th>Purchase Price</th><td>{{ $product->purchase_price }}</td></tr>
                <tr><th>Stock</th><td>{{ $product->stock }} {{ $product->unit }}</td></tr>
                <tr><th>Status</th><td>{{ $product->status }}</td></tr>
                <tr><th>Description</th><td>{{ $product->description }}</td></tr>
                <tr>
                    <th>Compatible Bike Models</th>
                    <td>
                        @foreach ($product->bikeModels as $bikeModel)
                            <span class="badge badge-secondary">{{ $bikeModel->company }} {{ $bikeModel->model }}</span>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>Aliases</th>
                    <td>{{ $product->aliases->pluck('alias')->implode(', ') }}</td>
                </tr>
            </table>

            <a href="{{ route('bilal-center.products.edit', $product) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection
