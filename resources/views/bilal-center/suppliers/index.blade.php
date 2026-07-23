@extends('bilal-center.layout')

@section('title', 'Suppliers')

@section('content')
    <h4 class="mb-3">Suppliers</h4>

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('bilal-center.suppliers.store') }}" method="POST" class="form-inline">
                @csrf
                <input type="text" name="name" class="form-control mr-2" placeholder="Supplier name" required>
                <input type="text" name="phone" class="form-control mr-2" placeholder="Phone">
                <input type="text" name="address" class="form-control mr-2" placeholder="Address">
                <select name="status" class="form-control mr-2">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <button type="submit" class="btn btn-primary">Add Supplier</button>
            </form>
        </div>
    </div>

    <table id="table" class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->status }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $supplier->id }}">Edit</button>
                        <form action="{{ route('bilal-center.suppliers.destroy', $supplier) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this supplier?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($suppliers as $supplier)
        <div class="modal fade" id="editModal{{ $supplier->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <form action="{{ route('bilal-center.suppliers.update', $supplier) }}" method="POST" class="modal-body">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $supplier->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $supplier->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $supplier->address }}">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="Active" @selected($supplier->status === 'Active')>Active</option>
                                <option value="Inactive" @selected($supplier->status === 'Inactive')>Inactive</option>
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
