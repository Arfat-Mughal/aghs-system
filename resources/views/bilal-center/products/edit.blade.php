@extends('bilal-center.layout')

@section('title', 'Edit Product')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-edit mr-2 text-muted"></i>Edit Product</h1>
            <div class="bc-subtitle">{{ $product->name_en }}</div>
        </div>
        <a href="{{ route('bilal-center.products.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i>Back to Products
        </a>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            <form action="{{ route('bilal-center.products.update', $product) }}" method="POST">
                @include('bilal-center.products._form')
            </form>
        </div>
    </div>

    <div class="bc-card">
        <div class="bc-card-body">
            <h5 class="font-weight-700 mb-3"><i class="fas fa-images mr-2 text-muted"></i>Product Images</h5>

            @if ($product->images->isNotEmpty())
                <div class="row mb-3">
                    @foreach ($product->images as $image)
                        <div class="col-6 col-md-2 mb-3 text-center">
                            <img src="{{ asset($image->image) }}" class="img-thumbnail mb-1">
                            <form action="{{ route('bilal-center.products.images.destroy', $image) }}" method="POST"
                                onsubmit="return confirm('Delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger btn-block">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted small">No images uploaded yet.</p>
            @endif

            <form id="bcImageUploadForm" action="{{ route('bilal-center.products.images.store', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label class="font-weight-600 d-block">Take Photo</label>
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#bcCameraModal">
                        <i class="fas fa-camera mr-1"></i>Open Camera
                    </button>
                    <input type="file" id="bcCameraPhoto" name="camera_photo" class="d-none" accept="image/*">
                    <img id="bcCameraPreview" class="img-thumbnail mt-2 d-none" style="max-height:120px;">
                </div>
                <div class="form-group mb-2">
                    <label class="font-weight-600 d-block">Or Choose Existing Photos</label>
                    <input type="file" name="images[]" class="form-control-file" multiple accept="image/*">
                </div>
                <button type="submit" class="btn btn-bc-primary mb-2">
                    <i class="fas fa-upload mr-1"></i>Upload
                </button>
            </form>
            <small class="form-text text-muted">"Open Camera" uses your device/webcam directly; the second field lets you pick one or more existing photos.</small>
        </div>
    </div>

    <div class="modal fade" id="bcCameraModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-camera mr-1"></i>Take Photo</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body text-center">
                    <video id="bcCameraVideo" autoplay playsinline class="w-100 mb-2" style="max-height:60vh; background:#000;"></video>
                    <canvas id="bcCameraCanvas" class="d-none"></canvas>
                    <div id="bcCameraError" class="text-danger small d-none"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="bcCaptureBtn" class="btn btn-bc-primary">
                        <i class="fas fa-camera mr-1"></i>Capture
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function () {
            var bcStream = null;

            function bcStopStream() {
                if (bcStream) {
                    bcStream.getTracks().forEach(function (track) { track.stop(); });
                    bcStream = null;
                }
            }

            $('#bcCameraModal').on('shown.bs.modal', function () {
                var errorEl = document.getElementById('bcCameraError');
                errorEl.classList.add('d-none');

                navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
                    .then(function (stream) {
                        bcStream = stream;
                        document.getElementById('bcCameraVideo').srcObject = stream;
                    })
                    .catch(function (err) {
                        errorEl.textContent = 'Could not access the camera: ' + err.message;
                        errorEl.classList.remove('d-none');
                    });
            });

            $('#bcCameraModal').on('hidden.bs.modal', function () {
                bcStopStream();
            });

            document.getElementById('bcCaptureBtn').addEventListener('click', function () {
                var video = document.getElementById('bcCameraVideo');
                var canvas = document.getElementById('bcCameraCanvas');

                if (!video.videoWidth) {
                    return;
                }

                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

                canvas.toBlob(function (blob) {
                    var file = new File([blob], 'camera-photo.jpg', { type: 'image/jpeg' });
                    var dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);

                    var input = document.getElementById('bcCameraPhoto');
                    input.files = dataTransfer.files;

                    var preview = document.getElementById('bcCameraPreview');
                    preview.src = URL.createObjectURL(blob);
                    preview.classList.remove('d-none');

                    $('#bcCameraModal').modal('hide');
                }, 'image/jpeg', 0.9);
            });
        })();
    </script>
@endsection
