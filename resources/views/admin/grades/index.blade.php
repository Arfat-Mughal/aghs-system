@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title-1">Classes</h2>
                        <form action="{{ isset($grade) ? route('grades.update', $grade->id) : route('grades.store') }}" method="POST" class="form-inline">
                            @csrf
                            @if(isset($grade))
                                @method('PUT')
                            @endif
                
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="name" class="sr-only">Grade Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($grade) ? $grade->name : old('name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                
                            <button type="submit" class="btn btn-primary mb-2">{{ isset($grade) ? 'Update' : 'Create' }}</button>
                        </form>
                    </div>
                </div>                
                <div class="row justify-content-center">
                    <!-- Display Grades -->
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($grades as $grade)
                                    <tr>
                                        <td>{{ $grade->id }}</td>
                                        <td>{{ $grade->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
