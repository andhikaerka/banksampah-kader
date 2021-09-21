<x-app-layout>
    <x-card>
        <x-slot name="title">
            Barang
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ route('admin.barang.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                <i class="flaticon2-plus-1"></i>Tambah Barang</a>
            </div>
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table">
            <thead class="thead-light">
                <th>No</th>
                <th>Barang</th>
                <th>Kategori</th>
                <th>Tgl Dibuat</th>
                <th>Tgl Diubah</th>
                <th>Dibuat Oleh</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($barangList as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->kategori->nama }}</td>
                        <td>{{ $barang->created_at }}</td>
                        <td>{{ $barang->updated_at }}</td>
                        <td>{{ $barang->created_user->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.barang.destroy', ['barang' => $barang->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <a href="{{ route('admin.barang.edit', ['barang' => $barang->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                <button onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- slot end --}}
    </x-card>
</x-app-layout>