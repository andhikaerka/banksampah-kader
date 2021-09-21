<x-app-layout>
    <x-card>
        <x-slot name="title">
            Ubah Barang Kategori
        </x-slot>

        {{-- slot start --}}
        <div class="card card-custom">
            <!--begin::Form-->
            <form action="{{ route('admin.barang-kategori.update', ['barang_kategori' => $barang_kategori->id]) }}" method="POST" id="kategori-update">
                @csrf
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label for="">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Kategori" value="{{ $barang_kategori->nama }}"/>
                </div>

                <a href="{{ route('admin.barang-kategori.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
            </form>
            <!--end::Form-->
            </div>
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\BarangKategoriUpdate',  '#kategori-store') !!}
        @endpush
    </x-card>
</x-app-layout>