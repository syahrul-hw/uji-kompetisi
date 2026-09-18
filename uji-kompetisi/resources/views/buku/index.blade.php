@include('layout.header')
@if (session('success')) <div id="success-notification" style="
     background-color: #d4edda;
     color: #155724;
     border: 1px solid #c3e6cb;
     padding: 12px 20px;
     margin: 15px 0;
     border-radius: 5px;
 ">
{{ session('success') }} </div>
<script>
    setTimeout(function() {
        const notification = document.getElementById('success-notification');

        if (notification) {
            notification.style.display = 'none';
        }
    }, 5000);
</script>
@endif

<!-- BAGIAN SEARCH DAN TAMBAH BUKU -->
<div class="buku-action">

<!-- SEARCH BUKU -->
<div class="search-container">
    <form action="{{ route('buku.index') }}" method="GET">
        <input
            type="text"
            name="search"
            placeholder="Cari judul buku..."
            value="{{ $search ?? '' }}"
        >
        <button type="submit" class="tombol">
            Cari
        </button>
    </form>
</div>
<!-- TOMBOL TAMBAH BUKU -->
<a href="{{ route('buku.create') }}" class="tombol tambah-buku">
    Tambah Buku
</a>

</div>
<!-- NOTIFIKASI JIKA BUKU TIDAK DITEMUKAN -->
@if(request('search') && $allBuku->isEmpty())
<div id="not-found-notification" style="
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 12px 20px;
    margin: 15px 0;
    border-radius: 5px;
">
    ⚠️ Buku dengan judul
    <strong>"{{ request('search') }}"</strong>
    tidak ditemukan.
</div>

<script>
    setTimeout(function() {
        const notification = document.getElementById('not-found-notification');

        if (notification) {
            notification.style.display = 'none';
        }
    }, 5000);
</script>
@endif
<!-- TABEL BUKU -->
<table class="table">
<thead>
    <tr>
        <th>ID</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Tahun Terbit</th>
        <th>Penerbit</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse ($allBuku as $key => $r)
        <tr>

            <td>{{ $key + 1 }}</td>
            <td>{{ $r->judul }}</td>
            <td>{{ $r->pengarang }}</td>
            <td>{{ $r->tahun_terbit }}</td>
            <td>
                {{ $r->penerbit->nama_penerbit }}
            </td>
            <td>
                {{ $r->kategori->nama_kategori }}
            </td>
            <td>
                <!-- DETAIL -->
                <a
                    href="{{ route('buku.show', $r->id) }}"
                    class="tombol"
                >
                    Detail
                </a>
                <!-- EDIT -->
                <a
                    href="{{ route('buku.edit', $r->id) }}"
                    class="tombol"
                >
                    Edit
                </a>
                <!-- HAPUS -->
                <form
                    action="{{ route('buku.destroy', $r->id) }}"
                    method="POST"
                    style="display:inline;"
                >
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="tombol"
                    >
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @empty
        @if(!request('search'))
            <tr>
                <td colspan="7" style="text-align: center;">
                    Belum ada data buku.
                </td>
            </tr>
        @endif
    @endforelse
</tbody>
</table>
<script>
    /*
     * ==========================================
     * DEBUGGING
     * ==========================================
     */

    console.log('Halaman data buku berhasil dimuat.');
    console.log('Jumlah data buku:', {{ $allBuku->count() }});
    /*
     * ==========================================
     * STRUKTUR DATA JSON
     * ==========================================
     *
     * Mengubah data buku dari Laravel Collection
     * menjadi Array of Objects dalam JavaScript.
     */
    const dataBuku = @json($allBuku);
    console.log('Data buku dalam JSON:', dataBuku);
    /*
     * ==========================================
     * MANIPULASI DATA DENGAN FILTER
     * ==========================================
     *
     * Menampilkan data buku yang tahun terbitnya
     * 2020 atau lebih baru.
     */
    const bukuTerfilter = dataBuku.filter(function(buku) {
        return buku.tahun_terbit >= 2020;
    });
    console.log('Buku tahun 2020 ke atas:', bukuTerfilter);
    /*
     * ==========================================
     * PERULANGAN DATA
     * ==========================================
     */
    bukuTerfilter.forEach(function(buku) {
        console.log('Judul buku:', buku.judul);
    });
</script>
@include('layout.footer')
