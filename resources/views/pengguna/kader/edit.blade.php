<x-app-layout>
    <x-card>
        <x-slot name="title">
            Ubah Kader
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form action="{{ route('pengguna.kader.update', ['kader' => $kader->id]) }}" method="POST" id="kader-update">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label for="">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="{{ $kader->name }}" />
            </div>

            <div class="form-group">
                <label for="">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $kader->email }}" />
            </div>

            <div class="form-group">
                <label for="">WA/Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon/WA" value="{{ $kader->telepon }}" />
            </div>

            <div class="form-group">
                <label for="">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat">{{ $kader->alamat }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="">Created At <span class="text-danger">*</span></label>
                <input type="text" class="form-control datepicker" name="created_at" id="created_at" placeholder="created_at" value="{{ $kader->created_at }}" style="width: 100%" />
            </div>

            <div class="form-group">
                <label for="">Kategori Kader (dari Admin) <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ auth()->user()->kader_kategori->nama }}" disabled />
            </div>

            <a href="{{ route('pengguna.kader.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\PenggunaKaderUpdate',  '#kader-update') !!}
        @endpush
    </x-card>
</x-app-layout>