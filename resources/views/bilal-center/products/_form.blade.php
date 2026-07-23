@csrf
@if (isset($product))
    @method('PUT')
@endif

<div class="row">
    <div class="col-md-3 form-group">
        <label>SKU *</label>
        <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror"
            value="{{ old('sku', $product->sku ?? '') }}" required>
        @error('sku') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label>Shop Code</label>
        <input type="text" name="shop_code" class="form-control @error('shop_code') is-invalid @enderror"
            value="{{ old('shop_code', $product->shop_code ?? '') }}">
        @error('shop_code') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label>Barcode</label>
        <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror"
            value="{{ old('barcode', $product->barcode ?? '') }}"
            placeholder="Leave blank to auto-generate">
        @error('barcode') <span class="invalid-feedback">{{ $message }}</span> @enderror
        @if (isset($product) && empty($product->barcode))
            <form action="{{ route('bilal-center.products.generate-barcode', $product) }}" method="POST" class="mt-1">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-secondary">Generate</button>
            </form>
        @endif
    </div>
    <div class="col-md-3 form-group">
        <label>OEM Number</label>
        <input type="text" name="oem_number" class="form-control @error('oem_number') is-invalid @enderror"
            value="{{ old('oem_number', $product->oem_number ?? '') }}">
        @error('oem_number') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 form-group">
        <label>Name (English) *</label>
        <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror"
            value="{{ old('name_en', $product->name_en ?? '') }}" required>
        @error('name_en') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-6 form-group">
        <label>Name (Urdu)</label>
        <input type="text" name="name_ur" class="form-control @error('name_ur') is-invalid @enderror"
            value="{{ old('name_ur', $product->name_ur ?? '') }}" dir="rtl">
        @error('name_ur') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="2">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label>Internal Notes (staff only)</label>
    <textarea name="internal_notes" class="form-control @error('internal_notes') is-invalid @enderror" rows="2">{{ old('internal_notes', $product->internal_notes ?? '') }}</textarea>
    @error('internal_notes') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label>Search Keywords (comma-separated)</label>
    <input type="text" name="search_keywords" class="form-control @error('search_keywords') is-invalid @enderror"
        value="{{ old('search_keywords', $product->search_keywords ?? '') }}">
    @error('search_keywords') <span class="invalid-feedback">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label>Aliases (comma-separated)</label>
    <input type="text" name="aliases" class="form-control"
        value="{{ old('aliases', isset($product) ? $product->aliases->pluck('alias')->implode(', ') : '') }}">
</div>

<div class="row">
    <div class="col-md-3 form-group">
        <label>Purchase Price *</label>
        <input type="number" step="0.01" name="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror"
            value="{{ old('purchase_price', $product->purchase_price ?? 0) }}" required>
        @error('purchase_price') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label>Selling Price *</label>
        <input type="number" step="0.01" name="selling_price" class="form-control @error('selling_price') is-invalid @enderror"
            value="{{ old('selling_price', $product->selling_price ?? 0) }}" required>
        @error('selling_price') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label>Stock *</label>
        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
            value="{{ old('stock', $product->stock ?? 0) }}" required>
        @error('stock') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label>Minimum Stock</label>
        <input type="number" name="minimum_stock" class="form-control @error('minimum_stock') is-invalid @enderror"
            value="{{ old('minimum_stock', $product->minimum_stock ?? 0) }}">
        @error('minimum_stock') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-3 form-group">
        <label>Unit *</label>
        <select name="unit" class="form-control @error('unit') is-invalid @enderror" required>
            @foreach (['Piece', 'Pair', 'Set', 'Box', 'Liter'] as $unit)
                <option value="{{ $unit }}" @selected(old('unit', $product->unit ?? 'Piece') === $unit)>{{ $unit }}</option>
            @endforeach
        </select>
        @error('unit') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label>Location</label>
        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror"
            value="{{ old('location', $product->location ?? '') }}" placeholder="Rack A-3, Shelf 2">
        @error('location') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-3 form-group">
        <label>Status *</label>
        <select name="status" class="form-control @error('status') is-invalid @enderror" required>
            @foreach (['Active', 'Inactive', 'Out of Stock', 'Discontinued'] as $status)
                <option value="{{ $status }}" @selected(old('status', $product->status ?? 'Active') === $status)>{{ $status }}</option>
            @endforeach
        </select>
        @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-4 form-group">
        <label>Brand</label>
        <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
            <option value="">-- None --</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id ?? '') == $brand->id)>{{ $brand->name }}</option>
            @endforeach
        </select>
        @error('brand_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-4 form-group">
        <label>Category</label>
        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
            <option value="">-- None --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-4 form-group">
        <label>Supplier</label>
        <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
            <option value="">-- None --</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" @selected(old('supplier_id', $product->supplier_id ?? '') == $supplier->id)>{{ $supplier->name }}</option>
            @endforeach
        </select>
        @error('supplier_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <label>Compatible Bike Models</label>
    @php $selectedBikeModels = isset($product) ? $product->bikeModels->pluck('id')->toArray() : []; @endphp
    <select name="bike_model_ids[]" class="form-control" multiple size="6">
        @foreach ($bikeModels as $bikeModel)
            <option value="{{ $bikeModel->id }}" @selected(in_array($bikeModel->id, old('bike_model_ids', $selectedBikeModels)))>
                {{ $bikeModel->company }} {{ $bikeModel->model }} ({{ $bikeModel->year_from }}-{{ $bikeModel->year_to ?? 'present' }})
            </option>
        @endforeach
    </select>
    <small class="form-text text-muted">Hold Ctrl (Cmd on Mac) to select multiple.</small>
</div>

<button type="submit" class="btn btn-primary">{{ isset($product) ? 'Update Product' : 'Create Product' }}</button>
