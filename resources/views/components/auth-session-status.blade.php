@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-success alert-dismissible fade show']) }} role="alert">
        <i class="ion-checkmark-circled me-2"></i>
        <strong>Success!</strong> {{ $status }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
