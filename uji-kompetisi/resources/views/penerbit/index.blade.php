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