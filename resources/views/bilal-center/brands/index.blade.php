@extends('bilal-center.layout')

@section('title', 'Brands')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-tags mr-2 text-muted"></i>Brands</h1>
            <div class="bc-subtitle">{{ $brands->count() }} brand{{ $brands->count() === 1 ? '' : 's' }}</div>
        </div>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            <form action="{{ route('bilal-center.brands.store') }}" method="POST" class="form-inline">
                @csrf
                <input type="text" name="name" class="form-control mr-2 mb-2" placeholder="Brand name" required>
                <input type="text" name="country" class="form-control mr-2 mb-2" placeholder="Country">
                <select name="status" class="form-control mr-2 mb-2">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <button type="submit" class="btn btn-bc-primary mb-2">
                    <i class="fas fa-plus mr-1"></i>Add Brand
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
                        <th>Country</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td class="font-weight-600">{{ $brand->name }}</td>
                            <td>{{ $brand->country }}</td>
                            <td>
                                <span class="bc-badge {{ $brand->status === 'Active' ? 'bc-badge-active' : 'bc-badge-inactive' }}">{{ $brand->status }}</span>
                            </td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editModal{{ $brand->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('bilal-center.brands.destroy', $brand) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this brand?')">
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

    @foreach ($brands as $brand)
        <div class="modal fade" id="editModal{{ $brand->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Brand</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <form action="{{ route('bilal-center.brands.update', $brand) }}" method="POST" class="modal-body">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $brand->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" class="form-control" value="{{ $brand->country }}">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="Active" {{ $brand->status === 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $brand->status === 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
