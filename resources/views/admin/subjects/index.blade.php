@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title-1">Classes</h2>
                        <form action="{{ route('subjects.store') }}" method="POST" class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="name" class="sr-only">subject Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ isset($subject) ? $subject->name : old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Create</button>
                        </form>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- Display subjects -->
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td>{{ $subject->id }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#updateModal{{ $subject->id }}">Update</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Modals -->
    @foreach ($subjects as $subject)
        <div class="modal fade" id="updateModal{{ $subject->id }}" tabindex="-1" role="dialog"
            aria-labelledby="updateModalLabel{{ $subject->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel{{ $subject->id }}">Update subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('subjects.update', $subject) }}" method="POST" class="modal-body">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">subject Name:</label>
                            <input type="hidden" name="id" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $subject->id }}">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $subject->name }}"
                                required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
