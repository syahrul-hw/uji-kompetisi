@include('layout.header')
    <a href="{{ route('penerbit.create') }}" class="tombol">Tambah Penerbit</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Penerbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allPenerbit as $key => $r)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $r->nama_penerbit }}</td>
                    <td>
                        <a href="{{ route('penerbit.show', $r->id) }}" class="tombol">Detail</a>
                        <a href="{{ route('penerbit.edit', $r->id) }}" class="tombol">Edit</a>
                        <form action="{{ route('penerbit.destroy', $r->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="tombol">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@include('layout.footer')