@include('layout.header')
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class=form-group>
            <label for="nama_kategori">Edit Kategori:</label>
            <input type="text" name="nama_kategori" id="" 
            value="{{ $kategori->nama_kategori }}">
        </div>
        <button type="submit" class="tombol">Submit</button>
    </form>
@include('layout.footer')