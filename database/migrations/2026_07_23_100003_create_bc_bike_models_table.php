<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'bilal_center';

    public function up(): void
    {
        Schema::create('bc_bike_models', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('model');
            $table->unsignedSmallInteger('year_from');
            $table->unsignedSmallInteger('year_to')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bc_bike_models');
    }
};
