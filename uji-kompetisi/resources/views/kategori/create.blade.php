@include('layout.header')
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class=form-group>
            <label for="nama_kategori">Tambah Kategori:</label>
            <input type="text" name="nama_kategori" id="" placeholder="Masukkan nama kategori">
        </div>
        <button type="submit" class="tombol">Submit</button>
    </form>
@include('layout.footer')