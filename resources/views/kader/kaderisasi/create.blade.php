<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Kader
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form action="{{ route('kader.kaderisasi.store') }}" method="POST" id="kader-store">
            @csrf

            <div class="form-group">
                <label for="">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama"/>
            </div>

            <div class="form-group">
                <label for="">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email"/>
            </div>

            <div class="form-group">
                <label for="">WA/Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon/WA"/>
            </div>


            <div class="form-group">
                <label for="">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"></textarea>
            </div>

            <div class="form-group">
                <label for="">Status Hubungan <span class="text-danger">*</span></label>
                <select class="form-control select2" name="status_hubungan" id="status_hubungan">
                    <option value="">- Pilih Status -</option>
                    @foreach ($statusHubunganList as $status)
                        <option value="{{ $status->id }}">{{ $status->nama }}</option>
                    @endforeach
                </select>
            </div>

            <a href="{{ route('kader.kaderisasi.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\PenggunaKaderStore',  '#kader-store') !!}
        @endpush
    </x-card>
</x-app-layout>