<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    // Field yang bisa diisi
    protected $fillable = [
        'user_id',
        'theme_id',
        'groom_name',
        'groom_nickname',
        'groom_father_name',
        'groom_mother_name',
        'bride_name',
        'bride_nickname',
        'bride_father_name',
        'bride_mother_name',
        'akad_date',
        'akad_location',
        'akad_address',
        'reception_date',
        'reception_location',
        'reception_address',
        'slug',
        'wedding_story_title',
        'wedding_story_content',
        'audio_music'
    ];

    // Relasi ke tabel users (satu undangan dimiliki satu user)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel themes (satu undangan menggunakan satu tema)
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    // Relasi ke tabel media (satu undangan bisa punya banyak foto)
    public function media()
    {
        return $this->hasMany(Media::class);
    }

    // Tambahkan relasi ke tabel rsvps (satu undangan bisa punya banyak RSVP)
    public function rsvps()
    {
        return $this->hasMany(Rsvp::class);
    }

    // Tambahkan relasi galeri (satu undangan bisa punya banyak foto)
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}