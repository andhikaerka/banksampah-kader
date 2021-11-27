<x-app-layout>
    <x-card>
        <x-slot name="title">
            Sponsor
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ route('admin.sponsor.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                <i class="flaticon2-plus-1"></i>Tambah Sponsor</a>
            </div>
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Lokasi</th>
                    <th>URL</th>
                    <th>Dibuat Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsorList as $sponsor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sponsor->judul }}</td>
                    <td class="text-center">
                        <img class="max-h-110px navbar-brand fw-bold" height="90px" src="{{ asset('sponsor/'.$sponsor->gambar) }}" alt="{{ $sponsor->alt_text }}">
                    </td>
                    <td>{{ $sponsor->lokasi }}</td>
                    <td><a href="{{ $sponsor->url }}" target="_blank">{{ $sponsor->url }}</a></td>
                    <td>{{ $sponsor->created_user->name }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.sponsor.destroy', ['sponsor' => $sponsor->id]) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <a href="{{ route('admin.sponsor.edit', ['sponsor' => $sponsor->id]) }}" class="btn btn-warning btn-sm">Edit</a>
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