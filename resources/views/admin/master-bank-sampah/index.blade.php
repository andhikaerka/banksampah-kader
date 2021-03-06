<x-app-layout>
    <x-card>
        <x-slot name="title">
            Bank Sampah
        </x-slot>

        <x-slot name="toolbar">
            <div class="card-toolbar">
                <a href="{{ route('admin.bank-sampah.create') }}" class="btn btn-sm btn-primary font-weight-bold">
                <i class="flaticon2-plus-1"></i>Tambah Bank Sampah</a>
            </div>
        </x-slot>

        {{-- slot start --}}
        <table class="table table-bordered" id="table" width="100%">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Bank Sampah</th>
                    <th>Provinsi</th>
                    <th>Kabupaten/Kota</th>
                    <th>Tgl Dibuat</th>
                    <th>Tgl Diubah</th>
                    <th>Dibuat Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bankSampahList as $bankSampah)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bankSampah->nama }}</td>
                        <td>{{ optional($bankSampah->provinsi)->name }}</td>
                        <td>{{ optional($bankSampah->kabupaten_kota)->name }}</td>
                        <td>{{ $bankSampah->created_at }}</td>
                        <td>{{ $bankSampah->updated_at }}</td>
                        <td>{{ $bankSampah->created_user->name }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.bank-sampah.destroy', ['bank_sampah' => $bankSampah->id]) }}">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <a href="{{ route('admin.bank-sampah.edit', ['bank_sampah' => $bankSampah->id]) }}" class="btn btn-warning btn-sm">Edit</a>
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