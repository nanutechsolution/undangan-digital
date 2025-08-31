<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    /**
     * Tampilkan daftar RSVP untuk sebuah undangan.
     */
    public function index(Invitation $invitation)
    {
        // Pastikan undangan ini milik user yang sedang login
        if ($invitation->user_id !== auth()->id()) {
            abort(403);
        }

        $rsvps = $invitation->rsvps;

        $stats = [
            'total' => $rsvps->count(),
            'hadir' => $rsvps->where('attendance', 'hadir')->count(),
            'tidak_hadir' => $rsvps->where('attendance', 'tidak_hadir')->count(),
            'ragu' => $rsvps->where('attendance', 'ragu')->count(),
        ];

        return view('rsvps.index', compact('invitation', 'rsvps', 'stats'));
    }
}