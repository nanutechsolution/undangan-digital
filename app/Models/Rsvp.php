<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    use HasFactory;

    protected $fillable = [
        'invitation_id',
        'name',
        'phone_number',
        'attendance',
        'message',
    ];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }
}