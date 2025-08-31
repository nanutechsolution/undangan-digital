<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{



    public function index(Invitation $invitation)
    {
        if ($invitation->user_id !== auth()->id()) {
            abort(403);
        }

        $galleries = $invitation->galleries;
        return view('galleries.index', compact('invitation', 'galleries'));
    }
    /**
     * Simpan foto baru ke galeri.
     */
    public function store(Request $request, Invitation $invitation)
    {
        // Pastikan undangan ini milik user yang sedang login
        if ($invitation->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'photos' => 'required',
            'photos.*' => 'image|max:2048', // Maksimal 2MB per gambar
        ]);

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('galleries', 'public');
            Gallery::create([
                'invitation_id' => $invitation->id,
                'photo_path' => $path,
            ]);
        }

        return redirect()->back()->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }

    /**
     * Hapus foto dari galeri.
     */
    public function destroy(Gallery $gallery)
    {
        // Pastikan foto milik user yang sedang login
        if ($gallery->invitation->user_id !== auth()->id()) {
            abort(403);
        }

        Storage::delete('public/' . $gallery->photo_path);
        $gallery->delete();

        return redirect()->back()->with('success', 'Foto berhasil dihapus.');
    }
}