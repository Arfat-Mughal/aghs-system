@extends('layouts.mainLayout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($ebook->cover_image)
                                <img src="{{ asset('storage/' . $ebook->cover_image) }}" class="img-fluid" alt="{{ $ebook->title }}">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <i class="fas fa-book fa-5x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h1>{{ $ebook->title }}</h1>
                            <p class="text-muted">
                                by {{ $ebook->author->name ?? 'Unknown Author' }} | 
                                Released: {{ $ebook->release_date->format('F d, Y') }}
                            </p>
                            
                            @if($ebook->length)
                                <p><strong>Length:</strong> {{ $ebook->length }} pages</p>
                            @endif
                            
                            <div class="mb-3">
                                <strong>Genres:</strong>
                                @foreach($ebook->genres as $genre)
                                    <span class="badge badge-secondary">{{ $genre->name }}</span>
                                @endforeach
                            </div>
                            
                            @if($ebook->files->count() > 0)
                                <div class="mt-4">
                                    <div class="btn-group" role="group">
                                        @foreach($ebook->files as $file)
                                            <a href="{{ route('frontend.ebooks.download', $file) }}" class="btn btn-primary">
                                               Download {{ strtoupper($file->file_type) }} File
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <h3>Description</h3>
                        @if($ebook->long_description)
                            <p>{!! nl2br(e($ebook->long_description)) !!}</p>
                        @elseif($ebook->short_description)
                            <p>{!! nl2br(e($ebook->short_description)) !!}</p>
                        @else
                            <p>No description available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5>Book Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><strong>Title:</strong> {{ $ebook->title }}</li>
                        <li><strong>Author:</strong> {{ $ebook->author->name ?? 'Unknown Author' }}</li>
                        <li><strong>Release Date:</strong> {{ $ebook->release_date->format('F d, Y') }}</li>
                        @if($ebook->length)
                            <li><strong>Pages:</strong> {{ $ebook->length }}</li>
                        @endif
                        <li><strong>Genres:</strong>
                            <ul>
                                @foreach($ebook->genres as $genre)
                                    <li>{{ $genre->name }}</li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection