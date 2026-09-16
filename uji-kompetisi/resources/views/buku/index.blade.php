@include('layout.header')
@if (session('success'))
    <div id="success-notification" style="
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 12px 20px;
        margin: 15px 0;
        border-radius: 5px;
    ">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            const notification = document.getElementById('success-notification');

            if (notification) {
                notification.style.display = 'none';
            }
        }, 5000);
    </script>
@endif
    <a href="{{ route('buku.create') }}" class="tombol">Tambah Buku</a>
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
            @foreach ($allBuku as $key => $r)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $r->judul }}</td>
                    <td>{{ $r->pengarang }}</td>
                    <td>{{ $r->tahun_terbit }}</td>
                    <td>{{ $r->penerbit->nama_penerbit }}</td>
                    <td>{{ $r->kategori->nama_kategori }}</td>
                    <td>
                        <a href="{{ route('buku.show', $r->id) }}" class="tombol">Detail</a>
                        <a href="{{ route('buku.edit', $r->id) }}" class="tombol">Edit</a>
                        <form action="{{ route('buku.destroy', $r->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<script>
    console.log('Halaman data buku berhasil dimuat.');
    console.log('Jumlah data buku:', {{ $allBuku->count() }});
</script>
@include('layout.footer')