<x-app-layout>
    <x-card>
        <x-slot name="title">
            Ubah Kader
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form action="{{ route('kader.kaderisasi.update', ['kaderisasi' => $kaderisasi->id]) }}" method="POST" id="kader-update">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label for="">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="{{ $kaderisasi->name }}" />
            </div>

            <div class="form-group">
                <label for="">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $kaderisasi->email }}" />
            </div>

            <div class="form-group">
                <label for="">WA/Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon/WA" value="{{ $kaderisasi->telepon }}" />
            </div>

            <div class="form-group">
                <label for="">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat">{{ $kaderisasi->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Status Hubungan <span class="text-danger">*</span></label>
                <select class="form-control select2" name="status_hubungan" id="status_hubungan">
                    <option value="">- Pilih Status -</option>
                    @foreach ($statusHubunganList as $status)
                        <option value="{{ $status->id }}" @if($status->id == $kaderisasi->kader_status_id) selected @endif>{{ $status->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Bank SAmpah <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ $kaderisasi->bank_sampah->nama }}"/>
            </div>

            <div class="form-group">
                <label for="">Kader Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ $kaderisasi->kader_kategori->nama }}"/>
            </div>

            <a href="{{ route('kader.kaderisasi.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\KaderisasiUpdate',  '#kader-update') !!}
        @endpush
    </x-card>
</x-app-layout>