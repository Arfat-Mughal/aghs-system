<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datesheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('slip_id');
            $table->unsignedBigInteger('subject_id');
            $table->string('date', 150);
            $table->string('reporting', 150);
            $table->string('start_time', 150);
            $table->string('end_time', 150);
            $table->timestamps();

            $table->foreign('slip_id')->references('id')->on('slips')->onDelete('cascade');
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
        Schema::dropIfExists('datesheets');
    }
}
