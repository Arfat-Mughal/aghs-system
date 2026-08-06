<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print Barcodes</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+EAN13+Text&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 10px; }
        .label-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .label {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
            page-break-inside: avoid;
        }
        .label .barcode {
            font-family: 'Libre Barcode EAN13 Text', cursive;
            font-size: 48px;
            line-height: 1;
        }
        .label .barcode-number {
            font-size: 11px;
            letter-spacing: 1px;
        }
        .label .name {
            font-size: 12px;
            font-weight: bold;
            margin-top: 4px;
        }
        .label .brand {
            font-size: 10px;
            color: #555;
        }
        @media print {
            .label { border: 1px dashed #999; }
        }
    </style>
</head>
<body>
    <div class="label-grid">
        @foreach ($products as $product)
            <div class="label">
                @if ($product->barcode)
                    <div class="barcode">{{ $product->barcode }}</div>
                    <div class="barcode-number">{{ $product->barcode }}</div>
                @else
                    <div class="barcode-number">No barcode</div>
                @endif
                <div class="name">{{ $product->name_en }}</div>
                @if ($product->brand)
                    <div class="brand">{{ $product->brand->name }}</div>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
