<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Theme;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ThemeController extends Controller
{
    /**
     * Tampilkan daftar semua tema.
     */
    public function index()
    {
        $themes = Theme::all();
        return view('admin.themes.index', compact('themes'));
    }

    /**
     * Tampilkan form untuk membuat tema baru.
     */
    public function create()
    {
        return view('admin.themes.create');
    }

    /**
     * Simpan tema baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|unique:themes,name',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100048',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ]);

        // Proses upload gambar thumbnail
        $path = $request->file('thumbnail')->store('themes', 'public');
        $filename = basename($path);

        // Buat slug dari nama tema
        $slug = Str::slug($request->name);

        // Simpan data tema baru
        Theme::create([
            'name' => $request->name,
            'slug' => $slug,
            'thumbnail' => $filename,
            'description' => $request->description,
            'price' => $request->price ?? 0,
            'is_active' => true,
        ]);

        return redirect()->route('admin.themes.index')->with('success', 'Tema berhasil ditambahkan!');
    }

    /**
     * Tampilkan form untuk mengedit tema.
     */
    public function edit(Theme $theme)
    {
        return view('admin.themes.edit', compact('theme'));
    }

    /**
     * Perbarui data tema.
     */
    public function update(Request $request, Theme $theme)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|unique:themes,name,' . $theme->id,
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        // Siapkan data untuk update
        $data = $request->only(['name', 'description', 'price', 'is_active']);
        $data['slug'] = Str::slug($request->name);

        // Jika ada thumbnail baru, hapus yang lama dan upload yang baru
        if ($request->hasFile('thumbnail')) {
            Storage::delete('public/themes/' . $theme->thumbnail);
            $path = $request->file('thumbnail')->store('public/themes');
            $data['thumbnail'] = basename($path);
        }
        // Perbarui data tema
        $theme->update($data);
        return redirect()->route('admin.themes.index')->with('success', 'Tema berhasil diperbarui!');
    }

    /**
     * Hapus tema dari database.
     */
    public function destroy(Theme $theme)
    {
        // Hapus file thumbnail dari storage
        Storage::delete('public/themes/' . $theme->thumbnail);

        // Hapus record dari database
        $theme->delete();

        return redirect()->route('admin.themes.index')->with('success', 'Tema berhasil dihapus!');
    }
}