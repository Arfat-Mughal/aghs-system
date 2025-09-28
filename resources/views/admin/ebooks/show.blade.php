@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">E-Book Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('ebooks.edit', $ebook) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('ebooks.destroy', $ebook) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('ebooks.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            @if($ebook->cover_image)
                                <img src="{{ asset('storage/' . $ebook->cover_image) }}" alt="{{ $ebook->title }}" class="img-fluid">
                            @else
                                <div class="bg-light" style="width: 100%; height: 300px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-book fa-5x"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <h2>{{ $ebook->title }}</h2>
                            <p><strong>Author:</strong> {{ $ebook->author->name ?? 'N/A' }}</p>
                            <p><strong>Release Date:</strong> {{ $ebook->release_date->format('F d, Y') }}</p>
                            <p><strong>Length:</strong> {{ $ebook->length ?? 'N/A' }} pages</p>
                            <p><strong>Genres:</strong> {{ $ebook->genre_list }}</p>
                            <p><strong>Download Count:</strong> {{ $ebook->download_count }}</p>
                            <p><strong>Last Downloaded:</strong> {{ $ebook->last_downloaded_at ? $ebook->last_downloaded_at->format('F d, Y H:i') : 'Never' }}</p>
                            
                            @if($ebook->short_description)
                            <div class="mt-3">
                                <h4>Short Description</h4>
                                <p>{{ $ebook->short_description }}</p>
                            </div>
                            @endif
                            
                            @if($ebook->long_description)
                            <div class="mt-3">
                                <h4>Long Description</h4>
                                <div>{!! nl2br(e($ebook->long_description)) !!}</div>
                            </div>
                            @endif
                            
                            @if($ebook->scripture_references)
                            <div class="mt-3">
                                <h4>Scripture References</h4>
                                <p>{{ $ebook->scripture_references }}</p>
                            </div>
                            @endif
                            
                            @if($ebook->reflection_questions)
                            <div class="mt-3">
                                <h4>Reflection Questions</h4>
                                <div>{!! nl2br(e($ebook->reflection_questions)) !!}</div>
                            </div>
                            @endif
                            
                            @if($ebook->scripture_database_link)
                            <div class="mt-3">
                                <h4>Scripture Database Link</h4>
                                <p><a href="{{ $ebook->scripture_database_link }}" target="_blank">{{ $ebook->scripture_database_link }}</a></p>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- SEO Information -->
                    @if($ebook->seoMeta)
                    <hr>
                    <h4>SEO Information</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Meta Title:</strong> {{ $ebook->seoMeta->meta_title ?? 'N/A' }}</p>
                            <p><strong>Meta Description:</strong> {{ $ebook->seoMeta->meta_description ?? 'N/A' }}</p>
                            <p><strong>Meta Keywords:</strong> {{ $ebook->seoMeta->meta_keywords ?? 'N/A' }}</p>
                        </div>
                    </div>
                    @endif
                    
                    <!-- Files -->
                    @if($ebook->files->count() > 0)
                    <hr>
                    <h4>Available Files</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ebook->files as $file)
                                <tr>
                                    <td>{{ $file->original_name }}</td>
                                    <td>{{ strtoupper($file->file_type) }}</td>
                                    <td>{{ number_format($file->file_size / 1024, 2) }} KB</td>
                                    <td>
                                        <a href="{{ route('admin.ebooks.download', $file) }}" class="btn btn-sm btn-primary">Download</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                    
                    <!-- Reviews -->
                    @if($ebook->reviews->count() > 0)
                    <hr>
                    <h4>Reviews</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Reviewer</th>
                                    <th>Rating</th>
                                    <th>Review</th>
                                    <th>Approved</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ebook->reviews as $review)
                                <tr>
                                    <td>{{ $review->reviewer_name }}</td>
                                    <td>
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                    </td>
                                    <td>{{ $review->review_text }}</td>
                                    <td>
                                        @if($review->approved)
                                            <span class="badge badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-secondary">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection