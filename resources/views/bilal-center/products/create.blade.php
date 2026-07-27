@extends('bilal-center.layout')

@section('title', 'Add Product')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-plus mr-2 text-muted"></i>Add Product</h1>
        </div>
        <a href="{{ route('bilal-center.products.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i>Back to Products
        </a>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            <form action="{{ route('bilal-center.products.store') }}" method="POST" enctype="multipart/form-data">
                @include('bilal-center.products._form')

                <div class="form-group mt-3">
                    <label class="font-weight-600">Photo (optional)</label>
                    <input type="file" name="photo" accept="image/*" capture="environment" class="form-control-file">
                    <small class="form-text text-muted">Opens the camera directly on mobile; you can also pick an existing photo.</small>
                </div>
            </form>
        </div>
    </div>
@endsection
