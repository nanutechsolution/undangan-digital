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
        // Tabel 'themes' untuk menyimpan data tema/template undangan
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Nama tema, harus unik
            $table->string('slug')->unique()->nullable(); // URL slug untuk tema
            $table->string('thumbnail'); // Path gambar thumbnail tema
            $table->text('description')->nullable(); // Deskripsi tema
            $table->decimal('price', 8, 2)->default(0); // Harga tema, misal: 150000.00
            $table->boolean('is_active')->default(true); // Status tema (aktif/tidak)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};