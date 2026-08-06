@extends('bilal-center.layout')

@section('title', 'Enter PIN')

@section('content')
    <div class="row justify-content-center" style="margin-top: 3rem;">
        <div class="col-md-4">
            <div class="bc-card text-center">
                <div class="bc-card-body">
                    <div class="mb-3">
                        <i class="fas fa-lock fa-2x" style="color: var(--bc-primary);"></i>
                    </div>
                    <h4 class="font-weight-700 mb-1">Enter PIN to continue</h4>
                    <p class="text-muted small mb-4">Required to add, edit, or delete records</p>
                    <form action="{{ route('bilal-center.pin.verify') }}" method="POST">
                        @csrf
                        <div class="form-group text-left">
                            <input type="password" name="pin" id="pin"
                                class="form-control text-center @error('pin') is-invalid @enderror"
                                placeholder="••••" autofocus required>
                            @error('pin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-bc-primary btn-block">
                            <i class="fas fa-unlock mr-1"></i>Unlock
                        </button>
                    </form>
                    <a href="{{ route('home') }}" class="btn btn-link btn-block text-muted mt-1">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
