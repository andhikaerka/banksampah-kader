<x-app-layout>
    <x-card>
        <x-slot name="title">
            Pengguna
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th class="no-wrap">Status Profil</th>
                    <th>Bank Sampah</th>
                    <th>Kategori</th>
                    <th>Admin Approval</th>
                    <th>Tgl Dibuat</th>
                    <th>Tgl Diubah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penggunaList as $pengguna)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengguna->name }}</td>
                        <td class="no-wrap">
                            @if ($pengguna->pengguna_profile_status == null)
                                <span class="label label-light-warning label-inline font-weight-bold">Belum Lengkap</span>
                            @else
                                <span class="label label-light-primary label-inline font-weight-bold">Lengkap</span>
                            @endif
                        </td>
                        <td>{{ optional($pengguna->bank_sampah)->nama }}</td>
                        <td>{{ optional($pengguna->pengguna_kategori)->nama }}</td>
                        <td>
                            @if (optional($pengguna->approved_user)->name == null)
                                <span class="label label-light-danger label-inline font-weight-bold">pending</span>
                            @else
                                {{ $pengguna->approval_status }} oleh {{ $pengguna->approved_user->name }}
                            @endif
                        </td>
                        <td>{{ $pengguna->created_at }}</td>
                        <td>{{ $pengguna->updated_at }}</td>
                        <td>
                            @if ($pengguna->pengguna_profile_status)
                                <a href="{{ route('admin.pengguna.show', ['pengguna' => $pengguna->id]) }}" class="btn btn-info btn-sm">Detail</a>
                            @else 

                            <form method="POST" action="{{ route('admin.pengguna.destroy', ['pengguna' => $pengguna->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
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