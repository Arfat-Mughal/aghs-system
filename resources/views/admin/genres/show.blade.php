@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Genre Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('genres.edit', $genre) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('genres.destroy', $genre) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{ $genre->name }}</h2>
                            <p><strong>Slug:</strong> {{ $genre->slug }}</p>
                            
                            @if($genre->description)
                            <div class="mt-3">
                                <h4>Description</h4>
                                <div>{!! nl2br(e($genre->description)) !!}</div>
                            </div>
                            @endif
                            
                            <div class="mt-3">
                                <h4>E-Books ({{ $genre->ebooks()->count() }})</h4>
                                @if($genre->ebooks->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Release Date</th>
                                                <th>Downloads</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($genre->ebooks as $ebook)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.ebooks.show', $ebook) }}">{{ $ebook->title }}</a>
                                                </td>
                                                <td>{{ $ebook->author->name ?? 'N/A' }}</td>
                                                <td>{{ $ebook->release_date->format('F d, Y') }}</td>
                                                <td>{{ $ebook->download_count }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <p>No e-books found for this genre.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection