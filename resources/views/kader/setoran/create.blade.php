<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Setoran
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form action="{{ route('kader.setoran.store') }}" method="POST" id="kader-store">
            @csrf

            <div class="form-group row">
                <div class="col-3">
                    <select class="form-control select2" name="barang" id="barang">
                        <option value="">- Pilih Barang -</option>
                    </select>
                </div>
                <div class="col-3">
                    <input class="form-control" type="text" name="jumlah" id="Jumlah">
                </div>
                <div class="col-3">
                    <select class="form-control select2" name="berat_satuan" id="berat_satuan">
                        <option value="">- Pilih Berat Satuan -</option>
                    </select>
                </div>
                <div class="col-3">
                    <a href="{{ route('kader.kaderisasi.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                </div>
            </div>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\PenggunaKaderStore',  '#kader-store') !!}
        @endpush
    </x-card>
</x-app-layout>