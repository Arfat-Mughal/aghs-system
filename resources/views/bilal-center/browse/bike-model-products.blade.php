@extends('bilal-center.layout')

@section('title', $bikeModel->company . ' ' . $bikeModel->model)

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-motorcycle mr-2 text-muted"></i>{{ $bikeModel->company }} {{ $bikeModel->model }}</h1>
            <div class="bc-subtitle">
                {{ $bikeModel->year_from }}&ndash;{{ $bikeModel->year_to ?? 'present' }}
                &middot; {{ $products->total() }} compatible product{{ $products->total() === 1 ? '' : 's' }}
            </div>
        </div>
        <a href="{{ route('bilal-center.browse.bike-models') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i>All Bike Models
        </a>
    </div>

    @include('bilal-center.browse._product-list')
@endsection
