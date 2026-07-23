@extends('bilal-center.layout')

@section('title', 'Suppliers')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-truck mr-2 text-muted"></i>Suppliers</h1>
            <div class="bc-subtitle">{{ $suppliers->count() }} supplier{{ $suppliers->count() === 1 ? '' : 's' }}</div>
        </div>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            <form action="{{ route('bilal-center.suppliers.store') }}" method="POST" class="form-inline">
                @csrf
                <input type="text" name="name" class="form-control mr-2 mb-2" placeholder="Supplier name" required>
                <input type="text" name="phone" class="form-control mr-2 mb-2" placeholder="Phone">
                <input type="text" name="address" class="form-control mr-2 mb-2" placeholder="Address">
                <select name="status" class="form-control mr-2 mb-2">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <button type="submit" class="btn btn-bc-primary mb-2">
                    <i class="fas fa-plus mr-1"></i>Add Supplier
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
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td class="font-weight-600">{{ $supplier->name }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>
                                <span class="bc-badge {{ $supplier->status === 'Active' ? 'bc-badge-active' : 'bc-badge-inactive' }}">{{ $supplier->status }}</span>
                            </td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editModal{{ $supplier->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('bilal-center.suppliers.destroy', $supplier) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this supplier?')">
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
                            <button type="submit" class="btn btn-bc-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
