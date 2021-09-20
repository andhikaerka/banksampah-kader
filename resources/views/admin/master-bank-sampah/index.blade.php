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

        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Bank Sampah</th>
                <th>Tgl Dibuat</th>
                <th>Tgl Diubah</th>
                <th>Dibuat Oleh</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </x-card>
</x-app-layout>