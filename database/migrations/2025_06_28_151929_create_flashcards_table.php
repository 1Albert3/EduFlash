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
        Schema::create('flashcards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title_en');
            $table->string('title_fr');
            $table->text('summary_en');
            $table->text('summary_fr');
            $table->longText('content_en');
            $table->longText('content_fr');
            $table->text('keywords_en')->nullable();
            $table->text('keywords_fr')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('views_count')->default(0);
            $table->timestamps();
            
            $table->fullText(['title_en', 'summary_en', 'content_en', 'keywords_en']);
            $table->fullText(['title_fr', 'summary_fr', 'content_fr', 'keywords_fr']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flashcards');
    }
};
