<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Barang Berat
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <form action="{{ route('admin.barang-berat.store') }}" method="POST" id="berat-store">
            @csrf
            
            <div class="form-group">
                <label for="">Nama Berat <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Berat"/>
            </div>

            <div class="form-group">
                <label for="">Pengali <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="pengali" id="pengali" placeholder="Pengali"/>
            </div>

            <a href="{{ route('admin.barang-kategori.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\BarangBeratStore',  '#berat-store') !!}
        @endpush
    </x-card>
</x-app-layout>