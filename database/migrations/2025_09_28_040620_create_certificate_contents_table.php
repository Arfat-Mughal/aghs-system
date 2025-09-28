<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('certificate_id');
            $table->string('name', 50);
            $table->timestamps();

            $table->foreign('certificate_id')->references('id')->on('certificates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_contents');
    }
}
