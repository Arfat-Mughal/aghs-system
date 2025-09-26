@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'alert alert-danger alert-dismissible fade show']) }} role="alert">
        <i class="ion-alert-circled me-2"></i>
        <strong>Please fix the following errors:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
