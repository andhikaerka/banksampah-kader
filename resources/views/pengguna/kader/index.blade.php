<x-app-layout>
    <x-card>
        <x-slot name="title">
            Kader
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ asset('assets/import_kader.xls') }}" class="mr-2">
                    Download Template .xls
                </a>
                <a href="{{ route('pengguna.kader-import.create') }}" class="btn btn-sm btn-success font-weight-bold mr-2">
                    <i class="flaticon-signs-1"></i>Import Kader
                </a>

                <a href="{{ route('pengguna.kader.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                    <i class="flaticon2-plus-1"></i>Tambah Kader
                </a>
            </div>
        </x-slot>

        {{-- slot start --}}

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <x-auth-session-import-result class="mb-4" :result="session('result')" />

        <table class="table table-bordered" id="table" width="100%" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th class="no-wrap">Dibuat Oleh</th>
                    <th>Tgl Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kaderList as $kader)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kader->name }}</td>
                        <td>{{ $kader->email }}</td>
                        <td>{{ $kader->telepon }}</td>
                        <td class="no-wrap">{{ optional($kader->created_user)->name }}</td>
                        <td>{{ $kader->created_at }}</td>
                        <td class="no-wrap">
                            @if ($kader->created_by == auth()->user()->id)
                                <form method="POST" action="{{ route('pengguna.kader.destroy', ['kader' => $kader->id]) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <a href="{{ route('pengguna.kader.edit', ['kader' => $kader->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <button onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- slot end --}}
    </x-card>
</x-app-layout>