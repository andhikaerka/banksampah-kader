<x-app-layout>
    <x-card>
        <x-slot name="title">
            Kader Status
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ route('admin.kader-status.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                <i class="flaticon2-plus-1"></i>Tambah Status</a>
            </div>
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tgl Dibuat</th>
                    <th>Tgl Diubah</th>
                    <th>Dibuat Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kaderStatusList as $status)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $status->nama }}</td>
                        <td>{{ $status->created_at }}</td>
                        <td>{{ $status->updated_at }}</td>
                        <td>{{ $status->created_user->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.kader-status.destroy', ['kader_status' => $status->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <a href="{{ route('admin.kader-status.edit', ['kader_status' => $status->id]) }}" class="btn btn-warning btn-sm">Edit</a>
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