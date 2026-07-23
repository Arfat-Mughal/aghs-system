@extends('bilal-center.layout')

@section('title', 'Bike Models')

@section('content')
    <h4 class="mb-3">Bike Models</h4>

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('bilal-center.bike-models.store') }}" method="POST" class="form-inline">
                @csrf
                <input type="text" name="company" class="form-control mr-2" placeholder="Company (e.g. Honda)" required>
                <input type="text" name="model" class="form-control mr-2" placeholder="Model (e.g. CD70)" required>
                <input type="number" name="year_from" class="form-control mr-2" placeholder="Year from" style="width:120px" required>
                <input type="number" name="year_to" class="form-control mr-2" placeholder="Year to (blank = current)" style="width:160px">
                <button type="submit" class="btn btn-primary">Add Bike Model</button>
            </form>
        </div>
    </div>

    <table id="table" class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Model</th>
                <th>Year From</th>
                <th>Year To</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bikeModels as $bikeModel)
                <tr>
                    <td>{{ $bikeModel->id }}</td>
                    <td>{{ $bikeModel->company }}</td>
                    <td>{{ $bikeModel->model }}</td>
                    <td>{{ $bikeModel->year_from }}</td>
                    <td>{{ $bikeModel->year_to ?? 'Present' }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $bikeModel->id }}">Edit</button>
                        <form action="{{ route('bilal-center.bike-models.destroy', $bikeModel) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Delete this bike model?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($bikeModels as $bikeModel)
        <div class="modal fade" id="editModal{{ $bikeModel->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Bike Model</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <form action="{{ route('bilal-center.bike-models.update', $bikeModel) }}" method="POST" class="modal-body">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" name="company" class="form-control" value="{{ $bikeModel->company }}" required>
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" value="{{ $bikeModel->model }}" required>
                        </div>
                        <div class="form-group">
                            <label>Year From</label>
                            <input type="number" name="year_from" class="form-control" value="{{ $bikeModel->year_from }}" required>
                        </div>
                        <div class="form-group">
                            <label>Year To (blank = still current)</label>
                            <input type="number" name="year_to" class="form-control" value="{{ $bikeModel->year_to }}">
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
