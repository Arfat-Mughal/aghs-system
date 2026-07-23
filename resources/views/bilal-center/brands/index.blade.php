@extends('bilal-center.layout')

@section('title', 'Brands')

@section('content')
    <h4 class="mb-3">Brands</h4>

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('bilal-center.brands.store') }}" method="POST" class="form-inline">
                @csrf
                <input type="text" name="name" class="form-control mr-2" placeholder="Brand name" required>
                <input type="text" name="country" class="form-control mr-2" placeholder="Country">
                <select name="status" class="form-control mr-2">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <button type="submit" class="btn btn-primary">Add Brand</button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
    <table id="table" class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->country }}</td>
                    <td>{{ $brand->status }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $brand->id }}">Edit</button>
                        <form action="{{ route('bilal-center.brands.destroy', $brand) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this brand?')">
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
                                <option value="Active" @selected($brand->status === 'Active')>Active</option>
                                <option value="Inactive" @selected($brand->status === 'Inactive')>Inactive</option>
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
