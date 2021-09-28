<x-app-layout>
    <x-card>
        <x-slot name="title">
            Profile Pengguna {{ $pengguna->name }}
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form action="{{ route('admin.approval', ['pengguna' => $pengguna->id]) }}" method="POST" id="admin-approval">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label for="">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pengguna" value="{{ $pengguna->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $pengguna->email }}"/>
            </div>

            <div class="form-group">
                <label for="">WA/Telepon <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="telepon" id="telepon" placeholder="Nomor Telepon/WA" value="{{ $pengguna->telepon }}"/>
            </div>

            <div class="form-group">
                <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" placeholder="Pilih Tanggal Lahir" value="{{ $pengguna->tanggal_lahir }}" readonly style="width: 100%" />
            </div>

            <div class="form-group">
                <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                <div class="radio-inline">
                    <label class="radio">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" @if($pengguna->jenis_kelamin == 'Laki-laki') checked @endif />
                        <span></span>
                        Laki-laki
                    </label>
                    <label class="radio">
                        <input type="radio" name="jenis_kelamin" value="Perempuan" @if($pengguna->jenis_kelamin == 'Perempuan') checked @endif />
                        <span></span>
                        Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat" id="alamat">{{ $pengguna->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Provinsi <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ \Indonesia::findProvince($pengguna->province_id, $with = null)->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Kabupaten/Kota <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ \Indonesia::findCity($pengguna->city_id, $with = null)->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Kecamatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ \Indonesia::findDistrict($pengguna->district_id, $with = null)->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Desa/Kelurahan <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ \Indonesia::findVillage($pengguna->village_id, $with = null)->name }}"/>
            </div>

            <div class="form-group">
                <label for="">Kode Pos <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ $pengguna->kode_pos }}"/>
            </div>

            <div class="form-group">
                <label for="">Kategori Pengguna <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ $pengguna->pengguna_kategori->nama }}"/>
            </div>

            <div class="form-group">
                <label for="">Bank Sampah <span class="text-danger">*</span></label>
                <input type="text" class="form-control" value="{{ $pengguna->bank_sampah->nama }}"/>
            </div>

            <div class="form-group">
                <label for="">Kategori Kader Pengguna<span class="text-danger">*</span></label>
                <select class="form-control select2" name="kategori_kader" id="kategori_kader">
                    <option value="">- Pilih Kategori-</option>
                    @foreach ($kaderKategoriList as $kategori)
                        <option value="{{ $kategori->id }}" @if($kategori->id == $pengguna->kader_kategori_id) selected @endif>{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>

            <a href="{{ route('admin.pengguna.index') }}" class="btn btn-secondary mr-2">Batal</a>
            <button type="submit" class="btn btn-primary mr-2" name="approval" value="setuju">Setujui</button>
            <button type="submit" class="btn btn-danger mr-2" name="approval" value="tidak disetujui">Tidak Setujui</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\AdminPenggunaApprovalStore',  '#admin-approval') !!}
        @endpush
    </x-card>
</x-app-layout>