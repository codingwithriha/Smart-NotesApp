<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Pivot table — links notes to categories (Many-to-Many)
        // One note can have many categories, one category can have many notes
        Schema::create('note_category', function (Blueprint $table) {
            $table->foreignId('note_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->primary(['note_id', 'category_id']); // no duplicates
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('note_category');
    }
};