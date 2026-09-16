<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allKategori = kategori::all();

        return view('kategori.index', compact('allKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate(
            [
                'nama_kategori' => 'required|string|max:100',
            ],
            [
                'nama_kategori.required' => 'Nama kategori wajib diisi.',
                'nama_kategori.string' => 'Nama kategori harus berupa teks.',
                'nama_kategori.max' => 'Nama kategori maksimal 100 karakter.',
            ]
        );

        // Simpan data
        kategori::create($validated);

        // Redirect + notifikasi
        return redirect()->route('kategori.index')
                         ->with('success', 'Data kategori berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        // Validasi
        $validated = $request->validate(
            [
                'nama_kategori' => 'required|string|max:100',
            ],
            [
                'nama_kategori.required' => 'Nama kategori wajib diisi.',
                'nama_kategori.string' => 'Nama kategori harus berupa teks.',
                'nama_kategori.max' => 'Nama kategori maksimal 100 karakter.',
            ]
        );

        // Update data
        $kategori->update($validated);

        // Redirect + notifikasi
        return redirect()->route('kategori.index')
                         ->with('success', 'Data kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        // Hapus data
        $kategori->delete();

        // Redirect + notifikasi
        return redirect()->route('kategori.index')
                         ->with('success', 'Data kategori berhasil dihapus.');
    }
}