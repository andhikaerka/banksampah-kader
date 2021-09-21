<x-app-layout>
    <x-card>
        <x-slot name="title">
            Ubah Barang Berat
        </x-slot>

        {{-- slot start --}}
        <div class="card card-custom">
            <!--begin::Form-->
            <form action="{{ route('admin.barang-berat.update', ['barang_berat' => $barang_berat->id]) }}" method="POST" id="berat-update">
                @csrf
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label for="">Nama Berat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Berat" value="{{ $barang_berat->nama }}"/>
                </div>

                <div class="form-group">
                    <label for="">Pengali <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="pengali" id="pengali" placeholder="Pengali" value="{{ $barang_berat->pengali }}"/>
                </div>

                <a href="{{ route('admin.barang-berat.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
            </form>
            <!--end::Form-->
            </div>
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\BarangBeratUpdate',  '#berat-update') !!}
        @endpush
    </x-card>
</x-app-layout>