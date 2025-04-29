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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug');
            $table->json('short_description');
            $table->json('long_description');
            $table->json('general_objective')->nullable();
            $table->integer('price');
            $table->boolean('status')->default(true);
            $table->boolean('available')->default(true);
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();
            $table->string('background')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
