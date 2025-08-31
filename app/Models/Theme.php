<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    // Field yang bisa diisi
    protected $fillable = ['name', 'slug', 'thumbnail', 'description', 'price', 'is_active'];

    // Relasi ke tabel invitations (satu tema bisa digunakan oleh banyak undangan)
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}