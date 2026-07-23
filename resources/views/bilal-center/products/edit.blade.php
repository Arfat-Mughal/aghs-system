@extends('bilal-center.layout')

@section('title', 'Edit Product')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-pen mr-2 text-muted"></i>Edit Product</h1>
            <div class="bc-subtitle">{{ $product->name_en }}</div>
        </div>
        <a href="{{ route('bilal-center.products.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i>Back to Products
        </a>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            <form action="{{ route('bilal-center.products.update', $product) }}" method="POST">
                @include('bilal-center.products._form')
            </form>
        </div>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            <h5 class="font-weight-700 mb-3"><i class="fas fa-images mr-2 text-muted"></i>Product Images</h5>

            @if ($product->images->isNotEmpty())
                <div class="row mb-3">
                    @foreach ($product->images as $image)
                        <div class="col-6 col-md-2 mb-3 text-center">
                            <img src="{{ asset('storage/' . $image->image) }}" class="img-thumbnail mb-1">
                            <form action="{{ route('bilal-center.products.images.destroy', $image) }}" method="POST"
                                onsubmit="return confirm('Delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger btn-block">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted small">No images uploaded yet.</p>
            @endif

            <form action="{{ route('bilal-center.products.images.store', $product) }}" method="POST" enctype="multipart/form-data" class="form-inline">
                @csrf
                <input type="file" name="images[]" class="form-control-file mr-2 mb-2" multiple accept="image/*">
                <button type="submit" class="btn btn-bc-primary mb-2">
                    <i class="fas fa-upload mr-1"></i>Upload
                </button>
            </form>
        </div>
    </div>
@endsection
