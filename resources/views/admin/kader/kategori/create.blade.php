<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Kategori
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <form action="{{ route('admin.kader-kategori.store') }}" method="POST" id="kader-kategori-store">
            @csrf
            
            <div class="form-group">
                <label for="">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Kategori"/>
            </div>

            <a href="{{ route('admin.kader-kategori.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\KaderKategoriStore',  '#kader-kategori-store') !!}
        @endpush
    </x-card>
</x-app-layout>