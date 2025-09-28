<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ebook_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ebook_id')->constrained()->onDelete('cascade');
            $table->string('file_path'); // Path to the file
            $table->string('file_type'); // pdf, epub, mobi
            $table->string('original_name'); // Original file name
            $table->bigInteger('file_size')->nullable(); // File size in bytes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ebook_files');
    }
};