<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Barang Kategori
        </x-slot>

        {{-- slot start --}}
        <div class="card card-custom">
            <!--begin::Form-->
            <form action="{{ route('admin.barang-kategori.store') }}" method="POST" id="kategori-store">
                @csrf
                
                <div class="form-group">
                    <label for="">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Kategori"/>
                </div>

                <a href="{{ route('admin.barang-kategori.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
            </form>
            <!--end::Form-->
            </div>
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\BarangKategoriStore',  '#kategori-store') !!}
        @endpush
    </x-card>
</x-app-layout>