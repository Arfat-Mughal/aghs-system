@extends('bilal-center.layout')

@section('title', 'Browse Categories')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-sitemap mr-2 text-muted"></i>Browse by Category</h1>
            <div class="bc-subtitle">Tap a category to see its products</div>
        </div>
    </div>

    <div class="row">
        @forelse ($categories as $category)
            <div class="col-6 col-md-4 col-lg-3 mb-3">
                <div class="bc-card h-100">
                    <div class="bc-card-body">
                        <a href="{{ route('bilal-center.browse.category-products', $category) }}" class="font-weight-700" style="font-size:1.05rem;">
                            {{ $category->name }}
                        </a>
                        @if ($category->children->isNotEmpty())
                            <ul class="list-unstyled mt-2 mb-0 small">
                                @foreach ($category->children as $child)
                                    <li>
                                        <a href="{{ route('bilal-center.browse.category-products', $child) }}" class="text-muted">
                                            &mdash; {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">No categories yet.</p>
            </div>
        @endforelse
    </div>
@endsection
