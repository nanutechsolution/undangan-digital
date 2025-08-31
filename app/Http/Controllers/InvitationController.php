<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\Invitation;
use App\Models\Rsvp;
use App\Models\Visit;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    /**
     * Tampilkan form untuk membuat undangan baru.
     */
    public function create()
    {
        // Ambil semua tema yang aktif dari database
        $themes = Theme::where('is_active', true)->get();
        return view('invitations.create', compact('themes'));
    }
    /**
     * Tampilkan halaman berbagi undangan.
     */

    public function show(Request $request, $slug)
    {
        $invitation = Invitation::with(['theme', 'galleries'])->where('slug', $slug)->firstOrFail();
        // Simpan kunjungan baru ke database
        Visit::create(['invitation_id' => $invitation->id]);

        // Ambil nama tamu dari parameter URL, jika tidak ada, gunakan default
        $guest_name = $request->query('to', 'Tamu Undangan');

        return view('invitations.show', compact('invitation', 'guest_name'));
    }

    /**
     * Simpan undangan baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data input dari form
        $request->validate([
            'theme_id' => 'required|exists:themes,id',
            'groom_name' => 'required|string|max:255',
            'groom_nickname' => 'required|string|max:255',
            'bride_name' => 'required|string|max:255',
            'bride_nickname' => 'required|string|max:255',
            'akad_date' => 'required|date',
            'akad_location' => 'required|string|max:255',
            'reception_date' => 'required|date',
            'reception_location' => 'required|string|max:255',
        ]);

        // Buat slug unik dari nama mempelai
        $slug = Str::slug($request->groom_nickname . '-' . $request->bride_nickname . '-' . now()->timestamp);

        // Simpan data undangan baru ke database
        $invitation = Invitation::create([
            'user_id' => auth()->id(), // ID user yang sedang login
            'theme_id' => $request->theme_id,
            'groom_name' => $request->groom_name,
            'groom_nickname' => $request->groom_nickname,
            'groom_father_name' => $request->groom_father_name,
            'groom_mother_name' => $request->groom_mother_name,
            'bride_name' => $request->bride_name,
            'bride_nickname' => $request->bride_nickname,
            'bride_father_name' => $request->bride_father_name,
            'bride_mother_name' => $request->bride_mother_name,
            'akad_date' => $request->akad_date,
            'akad_location' => $request->akad_location,
            'akad_address' => $request->akad_address,
            'reception_date' => $request->reception_date,
            'reception_location' => $request->reception_location,
            'reception_address' => $request->reception_address,
            'slug' => $slug,
            'wedding_story_title' => $request->wedding_story_title,
            'wedding_story_content' => $request->wedding_story_content,
        ]);

        // Redirect ke dashboard user dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Undangan berhasil dibuat! Silakan tambahkan detail lainnya.');
    }
    /**
     * Perbarui data undangan di database.
     */
    public function update(Request $request, Invitation $invitation)
    {
        // Pastikan undangan ini milik user yang sedang login
        if ($invitation->user_id !== auth()->id()) {
            abort(403);
        }
        $request->validate([
            'theme_id' => 'required|exists:themes,id',
            'groom_name' => 'required|string|max:255',
            'groom_nickname' => 'required|string|max:255',
            'bride_name' => 'required|string|max:255',
            'bride_nickname' => 'required|string|max:255',
            'akad_date' => 'required|date',
            'akad_location' => 'required|string|max:255',
            'reception_date' => 'required|date',
            'reception_location' => 'required|string|max:255',
        ]);

        $invitation->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Undangan berhasil diperbarui!');
    }
    /**
     * Tampilkan halaman berbagi undangan.
     */
    public function share(Request $request, Invitation $invitation)
    {
        if ($invitation->user_id !== auth()->id()) {
            abort(403);
        }

        return view('invitations.share', compact('invitation'));
    }

    public function edit(Invitation $invitation)
    {
        // Pastikan undangan ini milik user yang sedang login
        if ($invitation->user_id !== auth()->id()) {
            abort(403);
        }

        $themes = Theme::where('is_active', true)->get();
        return view('invitations.edit', compact('invitation', 'themes'));
    }
    public function destroy(Invitation $invitation)
    {
        // Pastikan undangan ini milik user yang sedang login
        if ($invitation->user_id !== auth()->id()) {
            abort(403);
        }

        $invitation->delete();

        return redirect()->route('dashboard')->with('success', 'Undangan berhasil dihapus!');
    }




    /**
     * Simpan data RSVP dari tamu.
     */
    public function storeRsvp(Request $request, $slug)
    {
        $invitation = Invitation::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'attendance' => 'required|in:hadir,tidak_hadir,ragu',
            'message' => 'nullable|string',
        ]);

        Rsvp::create([
            'invitation_id' => $invitation->id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'attendance' => $request->attendance,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Terima kasih, konfirmasi kehadiran Anda telah kami terima!');
    }
}