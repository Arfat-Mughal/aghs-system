<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecodeMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recode_marks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recode_id');
            $table->string('t_marks', 11);
            $table->unsignedBigInteger('subject_id');
            $table->timestamps();

            $table->foreign('recode_id')->references('id')->on('recodes')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recode_marks');
    }
}
