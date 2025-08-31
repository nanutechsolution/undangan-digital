<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard dengan daftar undangan dan statistik RSVP.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        // Ambil semua undangan yang dimiliki oleh user yang sedang login,
        // dan muat juga relasi rsvps (eager loading)
        $invitations = Invitation::where('user_id', auth()->id())
            ->with('rsvps')
            ->get();

        return view('dashboard', compact('invitations'));
    }
}