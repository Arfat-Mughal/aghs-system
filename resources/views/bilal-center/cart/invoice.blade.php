<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; max-width: 600px; margin-inline: auto; }
        h1 { font-size: 20px; margin-bottom: 0; }
        .meta { color: #666; font-size: 12px; margin-bottom: 16px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 16px; }
        th, td { padding: 6px 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th.text-right, td.text-right { text-align: right; }
        tfoot th { border-top: 2px solid #333; font-size: 15px; }
        .actions { margin-top: 20px; }
        .actions a, .actions button {
            display: inline-block; padding: 8px 16px; border: 1px solid #333; background: #fff;
            color: #333; text-decoration: none; font-size: 14px; cursor: pointer; border-radius: 4px;
        }
        @media print {
            .actions { display: none; }
        }
    </style>
</head>
<body>
    <h1>Bilal Mobile & Collection Center</h1>
    <div class="meta">Invoice generated {{ $generatedAt->format('d M Y, h:i A') }}</div>

    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Unit Price</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lines as $line)
                <tr>
                    <td>{{ $line['product']->name_en }}</td>
                    <td class="text-right">{{ $line['qty'] }}</td>
                    <td class="text-right">Rs. {{ number_format($line['unit_price'], 2) }}</td>
                    <td class="text-right">Rs. {{ number_format($line['line_total'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3" class="text-right">Grand Total</th>
                <th class="text-right">Rs. {{ number_format($total, 2) }}</th>
            </tr>
        </tfoot>
    </table>

    <div class="actions">
        <button type="button" onclick="window.print()">Print</button>
        <a href="{{ route('bilal-center.products.index') }}">New Sale</a>
    </div>
</body>
</html>
