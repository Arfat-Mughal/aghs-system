@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Authors</h3>
                    <div class="card-tools">
                        <a href="{{ route('authors.create') }}" class="btn btn-primary">Add New Author</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($authors->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Bio</th>
                                    <th>E-Books</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($authors as $author)
                                <tr>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ Str::limit($author->bio, 100) }}</td>
                                    <td>{{ $author->ebooks()->count() }}</td>
                                    <td>
                                        <a href="{{ route('authors.show', $author) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display: inline-block;">
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
                        {{ $authors->links() }}
                    </div>
                    @else
                    <p>No authors found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection