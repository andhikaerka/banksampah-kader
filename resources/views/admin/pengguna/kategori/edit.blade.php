<x-app-layout>
    <x-card>
        <x-slot name="title">
            Ubah Kategori
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <form action="{{ route('admin.pengguna-kategori.update', ['pengguna_kategori' => $pengguna_kategori->id]) }}" method="POST" id="pengguna-kategori-update">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label for="">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Kategori" value="{{ $pengguna_kategori->nama }}"/>
            </div>

            <a href="{{ route('admin.pengguna-kategori.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\PenggunaKategoriUpdate',  '#pengguna-kategori-update') !!}
        @endpush
    </x-card>
</x-app-layout>