<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allBuku = buku::with(['penerbit', 'kategori'])->get();
        return view('buku.index', compact('allBuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penerbit = penerbit::all();
        $kategori = kategori::all();
        return view('buku.create', compact('penerbit', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //buat validasi
        $validated = $request->validate([
            
            'judul' => 'required|string|max:100',
            'pengarang' => 'required|string|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            ],

            [
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            ]
        );

        //simpan data
        buku::create($validated);

        //redirect ke index buku
        return redirect()->route('buku.index')
                 ->with('success', 'Data buku berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        $penerbit = penerbit::all();
        $kategori = kategori::all();
        return view('buku.edit', compact('buku', 'penerbit', 'kategori'));
    }

    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, buku $buku)
{
    // buat validasi
    $validated = $request->validate([
        'judul' => 'required|string|max:100',
        'pengarang' => 'required|string|max:100',
        'tahun_terbit' => 'required|integer:4',
        'kategori_id' => 'required',
        'penerbit_id' => 'required',
    ]);

    // update data
    $buku->update($validated);

    // redirect ke index buku dengan notifikasi
    return redirect()->route('buku.index')
                     ->with('success', 'Data buku berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)

{
    $buku->delete();

    return redirect()->route('buku.index')
                     ->with('success', 'Data buku berhasil dihapus.');
}
}
