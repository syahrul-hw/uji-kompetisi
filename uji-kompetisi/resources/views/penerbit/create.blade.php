@include('layout.header')
    <form action="{{ route('penerbit.store') }}" method="POST">
        @csrf
        <div class=form-group>
            <label for="nama_penerbit">Tambah Penerbit:</label>
            <input type="text" name="nama_penerbit" id="" placeholder="Masukkan nama penerbit">
        </div>
        <button type="submit" class="tombol">Submit</button>
    </form>
@include('layout.footer')