@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">E-Books</h3>
                    <div class="card-tools">
                        <a href="{{ route('ebooks.create') }}" class="btn btn-primary">Add New E-Book</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Search and Filters -->
                    <form method="GET" action="{{ route('ebooks.index') }}" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Search by title..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-3">
                                <select name="author" class="form-control">
                                    <option value="">All Authors</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->id }}" {{ request('author') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="genre" class="form-control">
                                    <option value="">All Genres</option>
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}" {{ request('genre') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('ebooks.index') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <input type="date" name="date_from" class="form-control" placeholder="From Date" value="{{ request('date_from') }}">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="date_to" class="form-control" placeholder="To Date" value="{{ request('date_to') }}">
                            </div>
                        </div>
                    </form>

                    <!-- E-Books List -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Release Date</th>
                                    <th>Length</th>
                                    <th>Genres</th>
                                    <th>Downloads</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ebooks as $ebook)
                                <tr>
                                    <td>
                                        @if($ebook->cover_image)
                                            <img src="{{ asset('storage/' . $ebook->cover_image) }}" alt="{{ $ebook->title }}" width="50">
                                        @else
                                            <div class="bg-light" style="width: 50px; height: 70px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-book"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('ebooks.show', $ebook) }}">{{ $ebook->title }}</a>
                                    </td>
                                    <td>{{ $ebook->author->name ?? 'N/A' }}</td>
                                    <td>{{ $ebook->release_date->format('M d, Y') }}</td>
                                    <td>{{ $ebook->length ?? 'N/A' }} pages</td>
                                    <td>{{ $ebook->genre_list }}</td>
                                    <td>{{ $ebook->download_count }}</td>
                                    <td>
                                        <a href="{{ route('ebooks.edit', $ebook) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('ebooks.destroy', $ebook) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No e-books found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $ebooks->links() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar removed -->
    </div>
</div>
@endsection