@extends('bilal-center.layout')

@section('title', 'Products')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-box mr-2 text-muted"></i>Products</h1>
            <div class="bc-subtitle">{{ $products->total() }} product{{ $products->total() === 1 ? '' : 's' }} in inventory</div>
        </div>
        <a href="{{ route('bilal-center.products.create') }}" class="btn btn-bc-primary">
            <i class="fas fa-plus mr-1"></i>Add Product
        </a>
    </div>

    <form action="{{ route('bilal-center.products.print-barcodes') }}" method="POST" target="_blank"
        id="print-barcodes-form" onsubmit="return bcConfirmSelection()">
        @csrf
    </form>

    <div class="bc-card">
        <div class="bc-toolbar">
            <form action="{{ route('bilal-center.products.index') }}" method="GET" class="bc-search d-flex">
                <div class="position-relative flex-grow-1">
                    <i class="fas fa-search bc-search-icon"></i>
                    <input type="text" name="q" value="{{ $q }}" class="form-control"
                        placeholder="Search name, SKU, barcode, OEM, alias...">
                </div>
                <button type="button" class="btn btn-outline-secondary ml-2" data-toggle="modal"
                    data-target="#barcodeScanModal" title="Scan barcode">
                    <i class="fas fa-camera"></i>
                </button>
            </form>
            <button type="submit" form="print-barcodes-form" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-print mr-1"></i>Print Selected Barcodes
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th style="width:2.5rem"></th>
                        <th>Name (EN)</th>
                        <th>Name (UR)</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th class="text-right">Stock</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td><input type="checkbox" name="product_ids[]" value="{{ $product->id }}" form="print-barcodes-form"></td>
                            <td>
                                <a href="{{ route('bilal-center.products.show', $product) }}" class="font-weight-600">
                                    {{ $product->name_en }}
                                </a>
                            </td>
                            <td dir="rtl">{{ $product->name_ur }}</td>
                            <td>{{ optional($product->brand)->name }}</td>
                            <td>{{ optional($product->category)->name }}</td>
                            <td class="text-right">{{ $product->stock }}</td>
                            <td>
                                @php
                                    $badgeClass = [
                                        'Active' => 'bc-badge-active',
                                        'Inactive' => 'bc-badge-inactive',
                                        'Out of Stock' => 'bc-badge-outofstock',
                                        'Discontinued' => 'bc-badge-discontinued',
                                    ][$product->status] ?? 'bc-badge-inactive';
                                @endphp
                                <span class="bc-badge {{ $badgeClass }}">{{ $product->status }}</span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('bilal-center.products.edit', $product) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="submit" form="delete-product-{{ $product->id }}" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center text-muted py-4">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($fuzzyMatches->isNotEmpty())
        <div class="bc-card">
            <div class="bc-card-body">
                <div class="text-muted small mb-2"><i class="fas fa-lightbulb mr-1"></i>Did you mean:</div>
                <div>
                    @foreach ($fuzzyMatches as $product)
                        <a href="{{ route('bilal-center.products.show', $product) }}" class="btn btn-sm btn-outline-secondary mr-2 mb-2">
                            {{ $product->name_en }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="barcodeScanModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-camera mr-1"></i>Scan Barcode</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="bcReader"></div>
                    <p class="text-muted small mt-2 mb-0">Point your camera at a product barcode.</p>
                    <hr>
                    <label for="bcBarcodeFile" class="d-block small text-muted mb-1">Or upload a photo of the barcode:</label>
                    <input type="file" id="bcBarcodeFile" accept="image/*" class="form-control-file">
                    <div id="bcFileReader" style="width:1px;height:1px;overflow:hidden;position:absolute;left:-9999px;"></div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($products as $product)
        <form id="delete-product-{{ $product->id }}" action="{{ route('bilal-center.products.destroy', $product) }}"
            method="POST" onsubmit="return confirm('Delete this product?')">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    {{ $products->links() }}
@endsection

@section('scripts')
    <script src="{{ asset('admin_assets/vendor/html5-qrcode/html5-qrcode.min.js') }}"></script>
    <script>
        function bcConfirmSelection() {
            if (document.querySelectorAll('input[name="product_ids[]"]:checked').length === 0) {
                alert('Please select at least one product');
                return false;
            }
            return true;
        }

        var bcScanner = null;
        var bcFileScanner = null;
        var bcFormats = [
            Html5QrcodeSupportedFormats.EAN_13,
            Html5QrcodeSupportedFormats.EAN_8,
            Html5QrcodeSupportedFormats.CODE_128,
            Html5QrcodeSupportedFormats.CODE_39,
            Html5QrcodeSupportedFormats.UPC_A,
        ];

        function bcOnDecoded(decodedText) {
            document.querySelector('.bc-search input[name="q"]').value = decodedText;
            $('#barcodeScanModal').modal('hide');
            document.querySelector('.bc-search').submit();
        }

        $('#barcodeScanModal').on('shown.bs.modal', function () {
            bcScanner = new Html5Qrcode('bcReader', { formatsToSupport: bcFormats });

            bcScanner.start(
                { facingMode: 'environment' },
                { fps: 10, qrbox: { width: 250, height: 150 } },
                function (decodedText) {
                    bcScanner.stop().then(function () {
                        bcOnDecoded(decodedText);
                    });
                },
                function () { /* ignore per-frame decode misses */ }
            ).catch(function (err) {
                alert('Could not start the camera: ' + err);
            });
        });

        $('#barcodeScanModal').on('hidden.bs.modal', function () {
            if (bcScanner) {
                bcScanner.stop().catch(function () {});
            }
            document.getElementById('bcBarcodeFile').value = '';
        });

        document.getElementById('bcBarcodeFile').addEventListener('change', function (e) {
            var file = e.target.files[0];
            if (!file) {
                return;
            }

            if (!bcFileScanner) {
                bcFileScanner = new Html5Qrcode('bcFileReader', { formatsToSupport: bcFormats });
            }

            var stopCameraThen;
            try {
                stopCameraThen = bcScanner ? Promise.resolve(bcScanner.stop()).catch(function () {}) : Promise.resolve();
            } catch (e) {
                stopCameraThen = Promise.resolve();
            }

            stopCameraThen.then(function () {
                return bcFileScanner.scanFile(file, false);
            }).then(function (decodedText) {
                bcOnDecoded(decodedText);
            }).catch(function (err) {
                alert('Could not read a barcode from that image: ' + err);
            });
        });
    </script>
@endsection
