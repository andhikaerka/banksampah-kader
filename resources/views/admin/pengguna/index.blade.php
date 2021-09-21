<x-app-layout>
    <x-card>
        <x-slot name="title">
            Pengguna
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table">
            <thead class="thead-light">
                <th>No</th>
                <th>Nama</th>
                <th>Bank Sampah</th>
                <th>Kategori</th>
                <th>Approval Admin</th>
                <th>Tgl Dibuat</th>
                <th>Tgl Diubah</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($penggunaList as $pengguna)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengguna->name }}</td>
                        <td>{{ $pengguna->name }}</td>
                        <td>{{ $pengguna->name }}</td>
                        <td>{{ $pengguna->name }}</td>
                        <td>{{ $pengguna->created_at }}</td>
                        <td>{{ $pengguna->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.pengguna.show', ['pengguna' => $pengguna->id]) }}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- slot end --}}
    </x-card>
</x-app-layout>