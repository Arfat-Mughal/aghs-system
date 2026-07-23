<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'bilal_center';

    public function up(): void
    {
        Schema::create('bc_product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('image');
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('bc_products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bc_product_images');
    }
};
