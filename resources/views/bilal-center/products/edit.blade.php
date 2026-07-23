@extends('bilal-center.layout')

@section('title', 'Edit Product')

@section('content')
    <h4 class="mb-3">Edit Product</h4>
    <form action="{{ route('bilal-center.products.update', $product) }}" method="POST">
        @include('bilal-center.products._form')
    </form>

    <hr>

    <h5>Product Images</h5>
    <div class="row mb-3">
        @foreach ($product->images as $image)
            <div class="col-md-2 mb-2 text-center">
                <img src="{{ asset('storage/' . $image->image) }}" class="img-thumbnail mb-1">
                <form action="{{ route('bilal-center.products.images.destroy', $image) }}" method="POST"
                    onsubmit="return confirm('Delete this image?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger btn-block">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

    <form action="{{ route('bilal-center.products.images.store', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Upload Images</label>
            <input type="file" name="images[]" class="form-control-file" multiple accept="image/*">
        </div>
        <button type="submit" class="btn btn-secondary">Upload</button>
    </form>
@endsection
