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
        Schema::create('rsvps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->constrained()->onDelete('cascade'); // Relasi ke undangan
            $table->string('name'); // Nama tamu
            $table->string('phone_number')->nullable(); // Opsional: nomor telepon tamu
            $table->string('attendance'); // Konfirmasi kehadiran: "hadir", "tidak_hadir", "ragu"
            $table->text('message')->nullable(); // Pesan dari tamu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rsvps');
    }
};