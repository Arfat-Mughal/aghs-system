<div class="bc-card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Name (EN)</th>
                    <th>Name (UR)</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th class="text-right">Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('bilal-center.products.show', $product) }}" class="font-weight-600">
                                {{ $product->name_en }}
                            </a>
                        </td>
                        <td dir="rtl">{{ $product->name_ur }}</td>
                        <td>{{ optional($product->brand)->name }}</td>
                        <td>{{ optional($product->category)->name }}</td>
                        <td class="text-right">Rs. {{ number_format($product->selling_price, 2) }}</td>
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if ($products->hasPages())
    <nav class="bc-pagination d-flex justify-content-center mt-3">
        {{ $products->onEachSide(1)->links('pagination::bootstrap-4') }}
    </nav>
@endif
