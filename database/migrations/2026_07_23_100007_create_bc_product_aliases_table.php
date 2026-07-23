<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'bilal_center';

    public function up(): void
    {
        Schema::create('bc_product_aliases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('alias');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('bc_products')->onDelete('cascade');
            $table->index('alias');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bc_product_aliases');
    }
};
