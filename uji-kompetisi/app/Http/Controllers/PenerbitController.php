<?php

namespace App\Http\Controllers;

use App\Models\penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPenerbit = penerbit::all();

        return view('penerbit.index', compact('allPenerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validated = $request->validate(
            [
                'nama_penerbit' => 'required|string|max:100',
            ],
            [
                'nama_penerbit.required' => 'Nama penerbit wajib diisi.',
                'nama_penerbit.string' => 'Nama penerbit harus berupa teks.',
                'nama_penerbit.max' => 'Nama penerbit maksimal 100 karakter.',
            ]
        );

        // Simpan data
        penerbit::create($validated);

        // Redirect + notifikasi
        return redirect()->route('penerbit.index')
                         ->with('success', 'Data penerbit berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(penerbit $penerbit)
    {
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(penerbit $penerbit)
    {
        return view('penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, penerbit $penerbit)
    {
        // Validasi
        $validated = $request->validate(
            [
                'nama_penerbit' => 'required|string|max:100',
            ],
            [
                'nama_penerbit.required' => 'Nama penerbit wajib diisi.',
                'nama_penerbit.string' => 'Nama penerbit harus berupa teks.',
                'nama_penerbit.max' => 'Nama penerbit maksimal 100 karakter.',
            ]
        );

        // Update data
        $penerbit->update($validated);

        // Redirect + notifikasi
        return redirect()->route('penerbit.index')
                         ->with('success', 'Data penerbit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(penerbit $penerbit)
    {
        // Hapus data
        $penerbit->delete();

        // Redirect + notifikasi
        return redirect()->route('penerbit.index')
                         ->with('success', 'Data penerbit berhasil dihapus.');
    }
}