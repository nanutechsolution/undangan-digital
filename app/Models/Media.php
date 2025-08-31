<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    // Field yang bisa diisi
    protected $fillable = ['invitation_id', 'file_path', 'file_name'];

    // Relasi ke tabel invitations (satu media dimiliki satu undangan)
    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}