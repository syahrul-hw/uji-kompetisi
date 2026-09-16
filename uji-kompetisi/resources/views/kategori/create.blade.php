@include('layout.header')

{{-- Pesan validasi --}}
@if ($errors->any())
    <div style="color: red; margin-bottom: 10px;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('kategori.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nama_kategori">Tambah Kategori:</label>

        <input 
            type="text" 
            name="nama_kategori" 
            id="nama_kategori"
            value="{{ old('nama_kategori') }}"
            placeholder="Masukkan nama kategori"
        >

        {{-- Pesan error khusus field nama kategori --}}
        @error('nama_kategori')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="tombol">Submit</button>
</form>

@include('layout.footer')
