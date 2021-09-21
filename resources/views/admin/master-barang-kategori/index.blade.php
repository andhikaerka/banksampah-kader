<x-app-layout>
    <x-card>
        <x-slot name="title">
            Barang Kategori
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ route('admin.barang-kategori.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                <i class="flaticon2-plus-1"></i>Tambah Kategori</a>
            </div>
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table">
            <thead class="thead-light">
                <th>No</th>
                <th>Kategori</th>
                <th>Tgl Dibuat</th>
                <th>Tgl Diubah</th>
                <th>Dibuat Oleh</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($kategoriList as $kategori)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->created_at }}</td>
                        <td>{{ $kategori->updated_at }}</td>
                        <td>{{ $kategori->created_user->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.barang-kategori.destroy', ['barang_kategori' => $kategori->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <a href="{{ route('admin.barang-kategori.edit', ['barang_kategori' => $kategori->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                <button onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- slot end --}}
    </x-card>

    @push('page-scripts')
        <script>
            $(document).ready(function () {
                $('#table').DataTable();
            });
        </script>
    @endpush
</x-app-layout>