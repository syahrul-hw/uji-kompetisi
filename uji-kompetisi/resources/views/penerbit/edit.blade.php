@include('layout.header')
    <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class=form-group>
            <label for="nama_penerbit">Edit Penerbit:</label>
            <input type="text" name="nama_penerbit" id="" 
            value="{{ $penerbit->nama_penerbit }}">
        </div>
        <button type="submit" class="tombol">Submit</button>
    </form>
@include('layout.footer')