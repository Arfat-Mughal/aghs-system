@extends('bilal-center.layout')

@section('title', 'Browse Bike Models')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-motorcycle mr-2 text-muted"></i>Browse by Bike Model</h1>
            <div class="bc-subtitle">Tap a bike model to see compatible products</div>
        </div>
    </div>

    @forelse ($bikeModels as $company => $models)
        <div class="bc-card">
            <div class="bc-card-body">
                <h5 class="font-weight-700 mb-3">{{ $company }}</h5>
                <div>
                    @foreach ($models as $bikeModel)
                        <a href="{{ route('bilal-center.browse.bike-model-products', $bikeModel) }}" class="btn btn-outline-secondary mr-2 mb-2">
                            {{ $bikeModel->model }}
                            <small class="text-muted">({{ $bikeModel->year_from }}&ndash;{{ $bikeModel->year_to ?? 'present' }})</small>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">No bike models yet.</p>
    @endforelse
@endsection
