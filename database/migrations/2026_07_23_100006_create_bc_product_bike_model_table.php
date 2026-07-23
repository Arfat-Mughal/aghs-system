<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'bilal_center';

    public function up(): void
    {
        Schema::create('bc_product_bike_model', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('bike_model_id');

            $table->primary(['product_id', 'bike_model_id']);

            $table->foreign('product_id')->references('id')->on('bc_products')->onDelete('cascade');
            $table->foreign('bike_model_id')->references('id')->on('bc_bike_models')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bc_product_bike_model');
    }
};
