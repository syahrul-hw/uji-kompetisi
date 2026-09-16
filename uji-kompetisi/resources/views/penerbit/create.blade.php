@include('layout.header')

{{-- Pesan validasi --}}
@if ($errors->any())
    <div style="color: red; margin-bottom: 10px;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

    <form action="{{ route('penerbit.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_penerbit">Tambah Penerbit:</label>
            <input type="text" name="nama_penerbit" id="nama_penerbit" placeholder="Masukkan nama penerbit" value="{{ old('nama_penerbit') }}">
        </div>
        <button type="submit" class="tombol">Submit</button>
    </form>
@include('layout.footer')