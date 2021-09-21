<x-app-layout>
    <x-card>
        <x-slot name="title">
            Ubah Barang
        </x-slot>
        {{-- slot start --}}
        <div class="card card-custom">
            <!--begin::Form-->
            <form action="{{ route('admin.barang.update', ['barang' => $barang->id]) }}" method="POST" id="barang-update">
                @csrf
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label for="">Nama Barang <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Barang" value="{{ $barang->nama }}" />
                </div>

                <div class="form-group">
                    <label for="">Kategori <span class="text-danger">*</span></label>
                    <select class="form-control" name="kategori" id="kategori">
                        @foreach ($kategoriList as $kategori)
                            <option value="{{ $kategori->id }}" @if($kategori->id == $barang->kategori_id) selected @endif>{{ $kategori->nama }}</option>
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
            {!! JsValidator::formRequest('App\Http\Requests\BarangUpdate',  '#barang-udpate') !!}
        @endpush
    </x-card>
</x-app-layout>