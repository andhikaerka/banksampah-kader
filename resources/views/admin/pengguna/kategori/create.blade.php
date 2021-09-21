<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Kategori
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <form action="{{ route('admin.pengguna-kategori.store') }}" method="POST" id="pengguna-kategori-store">
            @csrf
            
            <div class="form-group">
                <label for="">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Kategori"/>
            </div>

            <a href="{{ route('admin.pengguna-kategori.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\PenggunaKategoriStore',  '#pengguna-kategori-store') !!}
        @endpush
    </x-card>
</x-app-layout>