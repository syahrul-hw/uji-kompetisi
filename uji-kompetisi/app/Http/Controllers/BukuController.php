<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori;
use App\Models\penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Menampilkan semua data buku
     * dan melakukan pencarian berdasarkan judul.
     */
    public function index(Request $request)
    {
        // Mengambil kata pencarian dari form
        $search = $request->search;

        // Mengambil data buku beserta relasi kategori dan penerbit
        $query = buku::with(['penerbit', 'kategori']);

        // Jika user melakukan pencarian
        if ($search) {

            // Pencarian hanya berdasarkan judul buku
            $query->where('judul', 'like', '%' . $search . '%');
        }

        // Mengambil data hasil pencarian
        $allBuku = $query->get();

        // Mengirim data ke halaman buku.index
        return view('buku.index', compact('allBuku', 'search'));
    }


    /**
     * Menampilkan form untuk menambahkan buku.
     */
    public function create()
    {
        // Mengambil semua data penerbit
        $penerbit = penerbit::all();

        // Mengambil semua data kategori
        $kategori = kategori::all();

        return view('buku.create', compact('penerbit', 'kategori'));
    }


    /**
     * Menyimpan data buku baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data buku
        $validated = $request->validate([

            // Judul wajib diisi dan maksimal 100 karakter
            'judul' => 'required|string|max:100',

            // Pengarang wajib diisi dan maksimal 100 karakter
            'pengarang' => 'required|string|max:100',

            // Tahun terbit wajib berupa angka 4 digit
            'tahun_terbit' => 'required|integer|digits:4',

            // Kategori wajib dipilih
            'kategori_id' => 'required',

            // Penerbit wajib dipilih
            'penerbit_id' => 'required',

        ], [

            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',

            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',

            'tahun_terbit.digits' => 'Tahun terbit harus terdiri dari 4 digit.',

        ]);

        // Menyimpan data buku
        buku::create($validated);

        // Kembali ke halaman daftar buku
        return redirect()
            ->route('buku.index')
            ->with('success', 'Data buku berhasil disimpan.');
    }


    /**
     * Menampilkan detail buku.
     */
    public function show(buku $buku)
    {
        return view('buku.show', compact('buku'));
    }


    /**
     * Menampilkan form edit buku.
     */
    public function edit(buku $buku)
    {
        // Mengambil semua data penerbit
        $penerbit = penerbit::all();

        // Mengambil semua data kategori
        $kategori = kategori::all();

        return view(
            'buku.edit',
            compact('buku', 'penerbit', 'kategori')
        );
    }


    /**
     * Mengupdate data buku.
     */
    public function update(Request $request, buku $buku)
    {
        // Validasi data
        $validated = $request->validate([

            'judul' => 'required|string|max:100',

            'pengarang' => 'required|string|max:100',

            'tahun_terbit' => 'required|integer|digits:4',

            'kategori_id' => 'required',

            'penerbit_id' => 'required',

        ], [

            'tahun_terbit.digits' =>
                'Tahun terbit harus terdiri dari 4 digit.',

        ]);

        // Update data buku
        $buku->update($validated);

        // Kembali ke halaman daftar buku
        return redirect()
            ->route('buku.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }


    /**
     * Menghapus data buku.
     */
    public function destroy(buku $buku)
    {
        // Menghapus data buku
        $buku->delete();

        // Kembali ke halaman daftar buku
        return redirect()
            ->route('buku.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}
