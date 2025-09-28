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
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->string('cover_image')->nullable();
            $table->foreignId('author_id')->constrained()->onDelete('cascade');
            $table->date('release_date');
            $table->integer('length')->nullable(); // Page count
            $table->string('scripture_references')->nullable();
            $table->text('reflection_questions')->nullable();
            $table->string('scripture_database_link')->nullable();
            $table->integer('download_count')->default(0);
            $table->timestamp('last_downloaded_at')->nullable();
            $table->timestamps();
            
            // Indexes for optimization
            $table->index('title');
            $table->index('author_id');
            $table->index('slug');
            // Fulltext index will be added separately for supported databases
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ebooks');
    }
};