@extends('bilal-center.layout')

@section('title', 'Enter PIN')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Enter PIN to continue</h4>
                    <form action="{{ route('bilal-center.pin.verify') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="pin">PIN</label>
                            <input type="password" name="pin" id="pin"
                                class="form-control @error('pin') is-invalid @enderror" autofocus required>
                            @error('pin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Unlock</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
