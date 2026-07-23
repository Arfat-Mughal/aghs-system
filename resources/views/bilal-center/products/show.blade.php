@extends('bilal-center.layout')

@section('title', $product->name_en)

@section('content')
    <div class="bc-page-header">
        <div>
            <h1>
                {{ $product->name_en }}
                @if ($product->name_ur)
                    <span class="text-muted font-weight-normal" dir="rtl" style="font-size:1.1rem;">({{ $product->name_ur }})</span>
                @endif
            </h1>
            @php
                $badgeClass = [
                    'Active' => 'bc-badge-active',
                    'Inactive' => 'bc-badge-inactive',
                    'Out of Stock' => 'bc-badge-outofstock',
                    'Discontinued' => 'bc-badge-discontinued',
                ][$product->status] ?? 'bc-badge-inactive';
            @endphp
            <span class="bc-badge {{ $badgeClass }}">{{ $product->status }}</span>
        </div>
        <div>
            <a href="{{ route('bilal-center.products.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-arrow-left mr-1"></i>Back
            </a>
            <a href="{{ route('bilal-center.products.edit', $product) }}" class="btn btn-bc-primary btn-sm">
                <i class="fas fa-pen mr-1"></i>Edit
            </a>
        </div>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            @if ($product->images->isNotEmpty())
                <div class="row mb-4">
                    @foreach ($product->images as $image)
                        <div class="col-6 col-md-2">
                            <img src="{{ asset('storage/' . $image->image) }}" class="img-thumbnail">
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="text-muted small text-uppercase font-weight-700" style="letter-spacing:.04em;">Selling Price</div>
                    <div style="font-size:1.75rem; font-weight:700; color: var(--bc-primary);">Rs. {{ number_format($product->selling_price, 2) }}</div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="text-muted small text-uppercase font-weight-700" style="letter-spacing:.04em;">Purchase Price</div>
                    <div style="font-size:1.75rem; font-weight:700;">Rs. {{ number_format($product->purchase_price, 2) }}</div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="text-muted small text-uppercase font-weight-700" style="letter-spacing:.04em;">Stock</div>
                    <div style="font-size:1.75rem; font-weight:700;">{{ $product->stock }} <small class="text-muted" style="font-size:1rem;">{{ $product->unit }}</small></div>
                </div>
            </div>

            <table class="table">
                <tr><th class="text-muted" style="width:220px;">SKU</th><td><code>{{ $product->sku }}</code></td></tr>
                <tr><th class="text-muted">Barcode</th><td>{{ $product->barcode }}</td></tr>
                <tr><th class="text-muted">OEM Number</th><td>{{ $product->oem_number }}</td></tr>
                <tr><th class="text-muted">Shop Code</th><td>{{ $product->shop_code }}</td></tr>
                <tr><th class="text-muted">Brand</th><td>{{ optional($product->brand)->name }}</td></tr>
                <tr><th class="text-muted">Category</th><td>{{ optional($product->category)->name }}</td></tr>
                <tr><th class="text-muted">Description</th><td>{{ $product->description ?: '—' }}</td></tr>
                <tr>
                    <th class="text-muted">Compatible Bike Models</th>
                    <td>
                        @forelse ($product->bikeModels as $bikeModel)
                            <span class="bc-badge bc-badge-inactive mr-1">{{ $bikeModel->company }} {{ $bikeModel->model }}</span>
                        @empty
                            &mdash;
                        @endforelse
                    </td>
                </tr>
                <tr>
                    <th class="text-muted">Aliases</th>
                    <td>{{ $product->aliases->pluck('alias')->implode(', ') ?: '—' }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
