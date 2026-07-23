@extends('bilal-center.layout')

@section('title', $category->name)

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-sitemap mr-2 text-muted"></i>{{ $category->name }}</h1>
            <div class="bc-subtitle">{{ $products->total() }} product{{ $products->total() === 1 ? '' : 's' }}</div>
        </div>
        <a href="{{ route('bilal-center.browse.categories') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i>All Categories
        </a>
    </div>

    @if ($category->children->isNotEmpty())
        <div class="mb-3">
            @foreach ($category->children as $child)
                <a href="{{ route('bilal-center.browse.category-products', $child) }}" class="btn btn-sm btn-outline-secondary mr-2 mb-2">
                    {{ $child->name }}
                </a>
            @endforeach
        </div>
    @endif

    @include('bilal-center.browse._product-list')
@endsection
