@extends('layouts.mainLayout')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-9">
            <h1 class="mb-2">E-Books Library</h1>

            @if($ebooks->count() > 0)
                <div class="row">
                    @foreach($ebooks as $ebook)
                        <div class="col-md-6 mb-2">
                            <div class="card h-100">
                                @if($ebook->cover_image)
    <img src="{{ asset('storage/' . $ebook->cover_image) }}" 
         class="card-img-top" 
         alt="{{ $ebook->title }}" 
         style="width: 100%; height: 100%; object-fit: cover; image-rendering: -webkit-optimize-contrast; image-rendering: crisp-edges;">
@else
    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
        <i class="fas fa-book fa-2x text-muted"></i>
    </div>
@endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">
                                        <a href="{{ route('frontend.ebooks.show', $ebook->slug) }}">{{ $ebook->title }}</a>
                                    </h5>
                                    <p class="card-text">{{ Str::limit($ebook->short_description, 80) }}</p>
                                    <div class="mt-auto">
                                        <p class="text-muted small">
                                            by {{ $ebook->author->name ?? 'Unknown Author' }}
                                        </p>
                                        <div class="d-flex flex-wrap">
                                            @foreach($ebook->genres as $genre)
                                                <span class="badge badge-secondary mr-1 mb-1">{{ $genre->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $ebooks->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    <p>No e-books available at the moment.</p>
                </div>
            @endif
        </div>
        
        <!-- Sidebar with genres -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h6>Browse by Genre</h6>
                </div>
                <div class="card-body">
                    @if($genres->count() > 0)
                        <ul class="list-group">
                            @foreach($genres as $genre)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <a href="{{ route('frontend.ebooks.genre', $genre->slug) }}">{{ $genre->name }}</a>
                                    <span class="badge badge-primary badge-pill">{{ $genre->ebooks_count }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No genres available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection