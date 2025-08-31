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
        // Tabel 'invitations' untuk menyimpan data undangan setiap user
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->foreignId('theme_id')->constrained()->onDelete('cascade'); // Relasi ke tabel themes

            // Data mempelai pria
            $table->string('groom_name');
            $table->string('groom_nickname');
            $table->string('groom_father_name')->nullable();
            $table->string('groom_mother_name')->nullable();

            // Data mempelai wanita
            $table->string('bride_name');
            $table->string('bride_nickname');
            $table->string('bride_father_name')->nullable();
            $table->string('bride_mother_name')->nullable();

            // Detail acara
            $table->dateTime('akad_date');
            $table->string('akad_location');
            $table->text('akad_address')->nullable();
            $table->dateTime('reception_date');
            $table->string('reception_location');
            $table->text('reception_address')->nullable();

            $table->string('slug')->unique(); // URL unik untuk undangan
            $table->string('wedding_story_title')->nullable();
            $table->text('wedding_story_content')->nullable();
            $table->string('audio_music')->nullable(); // Path file musik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};