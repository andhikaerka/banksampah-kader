<x-app-layout>
    <x-card>
        <x-slot name="title">
            Kader
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ route('pengguna.kader.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                <i class="flaticon2-plus-1"></i>Tambah Kader</a>
            </div>
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table">
            <thead class="thead-light">
                <th>No</th>
                <th>Nama</th>
                <th>Tgl Dibuat</th>
                <th>Tgl Diubah</th>
                <th>Dibuat Oleh</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach ($kaderList as $kader)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kader->name }}</td>
                        <td>{{ $kader->created_at }}</td>
                        <td>{{ $kader->updated_at }}</td>
                        <td>{{ $kader->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('pengguna.kader.destroy', ['kader' => $kader->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <a href="{{ route('pengguna.kader.edit', ['kader' => $kader->id]) }}" class="btn btn-warning btn-sm">Edit</a>
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