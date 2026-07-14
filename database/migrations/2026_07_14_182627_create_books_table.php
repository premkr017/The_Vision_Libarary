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
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Kitab ka naam
        $table->string('author'); // Lekhak
        $table->string('isbn')->unique(); // Book ka unique code
        $table->integer('quantity'); // Kitni copy hai
        $table->text('description')->nullable(); // Chhota description
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
