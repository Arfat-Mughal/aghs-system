@extends('bilal-center.layout')

@section('title', 'Cart')

@section('content')
    <div class="bc-page-header">
        <div>
            <h1><i class="fas fa-shopping-cart mr-2 text-muted"></i>Cart</h1>
            <div class="bc-subtitle">{{ count($lines) }} item{{ count($lines) === 1 ? '' : 's' }}</div>
        </div>
        <a href="{{ route('bilal-center.products.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-arrow-left mr-1"></i>Back to Products
        </a>
    </div>

    <div class="bc-card">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-right">Unit Price</th>
                        <th class="text-right" style="width:120px;">Qty</th>
                        <th class="text-right">Line Total</th>
                        <th style="width:2.5rem"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lines as $line)
                        <tr>
                            <td>{{ $line['product']->name_en }}</td>
                            <td class="text-right">Rs. {{ number_format($line['unit_price'], 2) }}</td>
                            <td class="text-right">
                                <form action="{{ route('bilal-center.cart.update', $line['product']) }}" method="POST" class="form-inline justify-content-end">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="qty" value="{{ $line['qty'] }}" min="0" max="999"
                                        class="form-control form-control-sm text-right" style="width:70px;"
                                        onchange="this.form.submit()">
                                </form>
                            </td>
                            <td class="text-right">Rs. {{ number_format($line['line_total'], 2) }}</td>
                            <td class="text-right">
                                <form action="{{ route('bilal-center.cart.remove', $line['product']) }}" method="POST"
                                    onsubmit="return confirm('Remove this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Cart is empty. Scan or search for a product to add it.</td>
                        </tr>
                    @endforelse
                </tbody>
                @if (count($lines) > 0)
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-right">Grand Total</th>
                            <th class="text-right">Rs. {{ number_format($total, 2) }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>

    @if (count($lines) > 0)
        <form action="{{ route('bilal-center.checkout') }}" method="POST" target="_blank">
            @csrf
            <button type="submit" class="btn btn-bc-primary btn-lg">
                <i class="fas fa-print mr-1"></i>Checkout &amp; Print Invoice
            </button>
        </form>
    @endif
@endsection
