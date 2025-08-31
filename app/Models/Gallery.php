<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'invitation_id',
        'photo_path',
    ];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}