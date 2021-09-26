<x-app-layout>
    <x-card>
        <x-slot name="title">
            Barang Berat
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ route('admin.barang-berat.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                <i class="flaticon2-plus-1"></i>Tambah Barang Berat</a>
            </div>
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Berat</th>
                    <th>Pengali</th>
                    <th>Tgl Dibuat</th>
                    <th>Tgl Diubah</th>
                    <th>Dibuat Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangBeratList as $barangBerat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barangBerat->nama }}</td>
                        <td class="text-right">{{ (float) $barangBerat->pengali }}</td>
                        <td>{{ $barangBerat->created_at }}</td>
                        <td>{{ $barangBerat->updated_at }}</td>
                        <td>{{ $barangBerat->created_user->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.barang-berat.destroy', ['barang_berat' => $barangBerat->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <a href="{{ route('admin.barang-berat.edit', ['barang_berat' => $barangBerat->id]) }}" class="btn btn-warning btn-sm">Edit</a>
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