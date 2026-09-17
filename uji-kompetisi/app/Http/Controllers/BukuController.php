<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Menampilkan semua data buku.
     */
    public function index()
    {
        // Mengambil semua data buku beserta relasi kategori dan penerbit
        $allBuku = buku::with(['penerbit', 'kategori'])->get();

        return view('buku.index', compact('allBuku'));
    }

    /**
     * Menampilkan form untuk menambahkan buku.
     */
    public function create()
    {
        // Mengambil semua data penerbit untuk pilihan pada form
        $penerbit = penerbit::all();

        // Mengambil semua data kategori untuk pilihan pada form
        $kategori = kategori::all();

        return view('buku.create', compact('penerbit', 'kategori'));
    }

    /**
     * Menyimpan data buku baru ke database.
     */
    public function store(Request $request)
    {
        // =========================
        // VALIDASI DATA BUKU
        // =========================
        $validated = $request->validate([

            // Judul wajib diisi, harus berupa teks,
            // dan maksimal 100 karakter
            'judul' => 'required|string|max:100',

            // Pengarang wajib diisi, harus berupa teks,
            // dan maksimal 100 karakter
            'pengarang' => 'required|string|max:100',

            // Tahun terbit wajib diisi,
            // harus berupa angka dan terdiri dari 4 digit
            'tahun_terbit' => 'required|integer|digits:4',

            // Kategori wajib dipilih
            'kategori_id' => 'required',

            // Penerbit wajib dipilih
            'penerbit_id' => 'required',
            ],

            [
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'tahun_terbit.digits' => 'Tahun terbit harus terdiri dari 4 digit.',
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
        'tahun_terbit' => 'required|integer|digits:4',
        'kategori_id' => 'required',
        'penerbit_id' => 'required',
    ], [
        'tahun_terbit.digits' => 'Tahun terbit harus terdiri dari 4 digit.',
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
        // Menghapus data buku dari database
        $buku->delete();

        // Kembali ke halaman daftar buku
        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil dihapus.');
}
}
