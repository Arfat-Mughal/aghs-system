@extends('bilal-center.layout')

@section('title', 'Categories')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-sitemap mr-2 text-muted"></i>Categories</h1>
            <div class="bc-subtitle">{{ $categories->count() }} categor{{ $categories->count() === 1 ? 'y' : 'ies' }}</div>
        </div>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            <form action="{{ route('bilal-center.categories.store') }}" method="POST" class="form-inline">
                @csrf
                <input type="text" name="name" class="form-control mr-2 mb-2" placeholder="Category name" required>
                <select name="parent_id" class="form-control mr-2 mb-2">
                    <option value="">-- No parent (top level) --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-bc-primary mb-2">
                    <i class="fas fa-plus mr-1"></i>Add Category
                </button>
            </form>
        </div>
    </div>

    <div class="bc-card">
        <div class="table-responsive">
            <table id="table" class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="font-weight-600">
                                @if ($category->parent_id)
                                    <span class="text-muted">&mdash;&nbsp;</span>
                                @endif
                                {{ $category->name }}
                            </td>
                            <td>{{ optional($category->parent)->name }}</td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editModal{{ $category->id }}">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <form action="{{ route('bilal-center.categories.destroy', $category) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
                            <button type="submit" class="btn btn-bc-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
