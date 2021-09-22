<x-app-layout>
    <x-card>
        <x-slot name="title">
            Setoran
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ route('kader.setoran.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                    <i class="flaticon2-plus-1"></i>Tambah Setoran
                </a>
            </div>
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table">
            <thead class="thead-light">
                <th>No</th>
                <th>Barang</th>
                <th>Barang Kategori</th>
                <th>Jumlah</th>
                <th>Berat Satuan</th>
                <th>Tgl Dibuat</th>
                <th>Tgl Diubah</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($setoranList as $setoran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $setoran->barang->nama }}</td>
                        <td>{{ $setoran->barang->kategori->nama }}</td>
                        <td>{{ $setoran->jumlah }}</td>
                        <td>{{ $setoran->barang_berat->nama }}</td>
                        <td>{{ $setoran->created_at }}</td>
                        <td>{{ $setoran->updated_at }}</td>
                        <td>
                            <form method="POST" action="{{ route('kader.setoran.destroy', ['setoran' => $setoran->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
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