<?php

use App\Http\Controllers\BilalCenter\BikeModelController;
use App\Http\Controllers\BilalCenter\BrandController;
use App\Http\Controllers\BilalCenter\CategoryController;
use App\Http\Controllers\BilalCenter\PinController;
use App\Http\Controllers\BilalCenter\ProductController;
use App\Http\Controllers\BilalCenter\ProductImageController;
use App\Http\Controllers\BilalCenter\SupplierController;
use Illuminate\Support\Facades\Route;

Route::prefix('bilal-center')->name('bilal-center.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('bilal-center.products.index');
    })->name('home');

    Route::get('pin', [PinController::class, 'showForm'])->name('pin.form');
    Route::post('pin', [PinController::class, 'verify'])->name('pin.verify');

    // Public browse/search — no PIN required
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('bike-models', [BikeModelController::class, 'index'])->name('bike-models.index');

    // Mutations & printing — PIN-gated. "products/create" and "products/{product}/edit" MUST be
    // registered before the public "products/{product}" show route below, otherwise the show
    // route's wildcard would swallow "create" as a product id.
    Route::middleware('bilal.pin')->group(function () {
        Route::post('products/print-barcodes', [ProductController::class, 'printBarcodes'])->name('products.print-barcodes');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('products/{product}/generate-barcode', [ProductController::class, 'generateBarcode'])->name('products.generate-barcode');
        Route::post('products', [ProductController::class, 'store'])->name('products.store');
        Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

        Route::post('products/{product}/images', [ProductImageController::class, 'store'])->name('products.images.store');
        Route::put('product-images/{image}', [ProductImageController::class, 'update'])->name('products.images.update');
        Route::delete('product-images/{image}', [ProductImageController::class, 'destroy'])->name('products.images.destroy');

        Route::resource('brands', BrandController::class)->only(['store', 'update', 'destroy']);
        Route::resource('categories', CategoryController::class)->only(['store', 'update', 'destroy']);
        Route::resource('bike-models', BikeModelController::class)->only(['store', 'update', 'destroy']);
        Route::resource('suppliers', SupplierController::class)->only(['index', 'store', 'update', 'destroy']);

        // Product detail requires the PIN too. Registered last within this group so
        // "products/create" above still matches before this wildcard does.
        Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
    });
});
