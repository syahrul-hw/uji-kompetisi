@include('layout.header')
<h3>Edit Buku</h3>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class=form-group>
            <label for="judul">Judul Buku:</label>
            <input type="text" name="judul" id="" value="{{ $buku->judul }}" placeholder="Masukkan nama buku">
        </div>
        <div class=form-group>
            <label for="pengarang">Pengarang:</label>
            <input type="text" name="pengarang" id="" value="{{ $buku->pengarang }}" placeholder="Masukkan nama pengarang">
        </div>
        <div class=form-group>
            <label for="tahun_terbit">Tahun Terbit:</label>
            <input type="text" name="tahun_terbit" id="" value="{{ $buku->tahun_terbit }}" placeholder="Masukkan tahun terbit">
        </div>
        <div class=form-group>
            <label for="penerbit_id">Pilih Penerbit:</label>
            <select name="penerbit_id" id="">
                @foreach ($penerbit as $p)
                    <option value="{{ $p->id }}" {{ $buku->penerbit_id == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_penerbit }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class=form-group>
            <label for="kategori_id">Pilih Kategori:</label>
            <select name="kategori_id" id="">
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ $buku->kategori_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="tombol">Submit</button>
    </form>
@include('layout.footer')