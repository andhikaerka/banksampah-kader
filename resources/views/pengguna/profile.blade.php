<x-app-layout>
    <x-card>
        <x-slot name="title">
            Profile Pengguna
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form action="{{ route('pengguna.profile.update') }}" method="POST" id="pengguna-profile-update">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label for="">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->email }}"/>
            </div>

            <div class="form-group">
                <label for="">WA/Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat" id="alamat"></textarea>
            </div>

            <div class="form-group">
                <label for="">Provinsi <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Kabupaten/Kota <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Kecamatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Desa/Kelurahan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Kode Pos <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Kategori Pengguna <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Bank Sampah <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <a href="{{ route('pengguna.profile') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\BankSampahUpdate',  '#pengguna-profile-update') !!}
        @endpush
    </x-card>
</x-app-layout>