<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('father_name', 150);
            $table->date('dob')->nullable();
            $table->string('email', 150)->nullable();
            $table->string('religion', 150)->nullable();
            $table->string('b_form', 30)->nullable();
            $table->string('gender', 20)->nullable();
            $table->string('cnic', 20)->nullable();
            $table->string('occupation', 255)->nullable();
            $table->string('quran', 11)->nullable();
            $table->longText('address')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('cell', 50)->nullable();
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->string('addmission_no', 50)->nullable();
            $table->string('date', 50)->nullable();
            $table->string('path', 80)->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('position', 50)->nullable();
            $table->integer('o_marks')->nullable();
            $table->timestamps();

            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
