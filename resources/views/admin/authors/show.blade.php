@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Author Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            @if($author->image)
                                <img src="{{ asset('storage/' . $author->image) }}" alt="{{ $author->name }}" class="img-fluid">
                            @else
                                <div class="bg-light" style="width: 100%; height: 300px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-user fa-5x"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <h2>{{ $author->name }}</h2>
                            
                            @if($author->bio)
                            <div class="mt-3">
                                <h4>Bio</h4>
                                <div>{!! nl2br(e($author->bio)) !!}</div>
                            </div>
                            @endif
                            
                            <div class="mt-3">
                                <h4>E-Books ({{ $author->ebooks()->count() }})</h4>
                                @if($author->ebooks->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Release Date</th>
                                                <th>Downloads</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($author->ebooks as $ebook)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.ebooks.show', $ebook) }}">{{ $ebook->title }}</a>
                                                </td>
                                                <td>{{ $ebook->release_date->format('F d, Y') }}</td>
                                                <td>{{ $ebook->download_count }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <p>No e-books found for this author.</p>
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