<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'bilal_center';

    public function up(): void
    {
        Schema::create('bc_products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('barcode')->nullable()->unique();
            $table->string('oem_number')->nullable()->index();
            $table->string('shop_code')->nullable()->unique();
            $table->string('name_en');
            $table->string('name_ur')->nullable();
            $table->text('description')->nullable();
            $table->text('internal_notes')->nullable();
            $table->decimal('purchase_price', 12, 2)->default(0);
            $table->decimal('selling_price', 12, 2)->default(0);
            $table->integer('stock')->default(0);
            $table->integer('minimum_stock')->default(0);
            $table->string('unit')->default('Piece');
            $table->string('location')->nullable();
            $table->string('search_keywords', 1000)->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand_id')->references('id')->on('bc_brands')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('bc_categories')->onDelete('set null');
            $table->foreign('supplier_id')->references('id')->on('bc_suppliers')->onDelete('set null');

            $table->index('name_en');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bc_products');
    }
};
