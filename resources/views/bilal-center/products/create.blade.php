@extends('bilal-center.layout')

@section('title', 'Add Product')

@section('content')
    <h4 class="mb-3">Add Product</h4>
    <form action="{{ route('bilal-center.products.store') }}" method="POST">
        @include('bilal-center.products._form')
    </form>
@endsection
