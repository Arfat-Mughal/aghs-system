@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Genres</h3>
                    <div class="card-tools">
                        <a href="{{ route('genres.create') }}" class="btn btn-primary">Add New Genre</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($genres->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>E-Books</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($genres as $genre)
                                <tr>
                                    <td>{{ $genre->name }}</td>
                                    <td>{{ $genre->slug }}</td>
                                    <td>{{ Str::limit($genre->description, 100) }}</td>
                                    <td>{{ $genre->ebooks()->count() }}</td>
                                    <td>
                                        <a href="{{ route('genres.show', $genre) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('genres.edit', $genre) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('genres.destroy', $genre) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $genres->links() }}
                    </div>
                    @else
                    <p>No genres found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection