@extends('bilal-center.layout')

@section('title', 'Categories')

@section('content')
    <h4 class="mb-3">Categories</h4>

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('bilal-center.categories.store') }}" method="POST" class="form-inline">
                @csrf
                <input type="text" name="name" class="form-control mr-2" placeholder="Category name" required>
                <select name="parent_id" class="form-control mr-2">
                    <option value="">-- No parent (top level) --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
    <table id="table" class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ optional($category->parent)->name }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $category->id }}">Edit</button>
                        <form action="{{ route('bilal-center.categories.destroy', $category) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    @foreach ($categories as $category)
        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <form action="{{ route('bilal-center.categories.update', $category) }}" method="POST" class="modal-body">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Parent Category</label>
                            <select name="parent_id" class="form-control">
                                <option value="">-- No parent (top level) --</option>
                                @foreach ($categories as $option)
                                    @if ($option->id !== $category->id)
                                        <option value="{{ $option->id }}" @selected($category->parent_id === $option->id)>{{ $option->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
