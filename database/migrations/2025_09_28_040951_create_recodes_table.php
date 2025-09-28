<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grade_id');
            $table->boolean('is_active')->default(0);
            $table->timestamps();

            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recodes');
    }
}
