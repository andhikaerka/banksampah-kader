<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Barang
        </x-slot>

        {{-- slot start --}}
        <div class="card card-custom">
            <!--begin::Form-->
            <form action="{{ route('admin.barang.store') }}" method="POST" id="barang-store">
                @csrf
                
                <div class="form-group">
                    <label for="">Nama Barang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Barang"/>
                </div>

                <div class="form-group">
                    <label for="">Kategori <span class="text-danger">*</span></label>
                    <select class="form-control" name="kategori" id="kategori">
                        @foreach ($kategoriList as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
            </form>
            <!--end::Form-->
            </div>
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\BarangStore',  '#barang-store') !!}
        @endpush
    </x-card>
</x-app-layout>