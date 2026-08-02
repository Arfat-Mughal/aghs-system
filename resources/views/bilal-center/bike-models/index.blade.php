@extends('bilal-center.layout')

@section('title', 'Bike Models')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-motorcycle mr-2 text-muted"></i>Bike Models</h1>
            <div class="bc-subtitle">{{ $bikeModels->count() }} model{{ $bikeModels->count() === 1 ? '' : 's' }}</div>
        </div>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            <form action="{{ route('bilal-center.bike-models.store') }}" method="POST" class="form-inline">
                @csrf
                <input type="text" name="company" class="form-control mr-2 mb-2" placeholder="Company (e.g. Honda)" required>
                <input type="text" name="model" class="form-control mr-2 mb-2" placeholder="Model (e.g. CD70)" required>
                <input type="number" name="year_from" class="form-control mr-2 mb-2" placeholder="Year from" style="width:120px" required>
                <input type="number" name="year_to" class="form-control mr-2 mb-2" placeholder="Year to (blank = current)" style="width:160px">
                <button type="submit" class="btn btn-bc-primary mb-2">
                    <i class="fas fa-plus mr-1"></i>Add Bike Model
                </button>
            </form>
        </div>
    </div>

    <div class="bc-card">
        <div class="table-responsive">
            <table id="table" class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Model</th>
                        <th>Year From</th>
                        <th>Year To</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bikeModels as $bikeModel)
                        <tr>
                            <td>{{ $bikeModel->company }}</td>
                            <td class="font-weight-600">{{ $bikeModel->model }}</td>
                            <td>{{ $bikeModel->year_from }}</td>
                            <td>{{ $bikeModel->year_to ?? 'Present' }}</td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#editModal{{ $bikeModel->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="{{ route('bilal-center.bike-models.destroy', $bikeModel) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Delete this bike model?')">
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
                            <button type="submit" class="btn btn-bc-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
