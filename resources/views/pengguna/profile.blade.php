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
                <select class="form-control select2" id="province" name="provinsi" onchange="ajaxChained('#province','#city','city')">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" @if($province->id == $pengguna->province_id) selected @endif>{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Kabupaten/Kota <span class="text-danger">*</span></label>
                <select class="form-control select2" id="city" name="kabupaten_kota" @if($pengguna->city_id == null) disabled @endif onchange="ajaxChained('#city','#district','district')">
                    <option value="">Pilih Kabupaten/Kota</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" @if($city->id == $pengguna->city_id) selected @endif>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Kecamatan <span class="text-danger">*</span></label>
                <select class="form-control select2" id="district" name="kecamatan" @if($pengguna->district_id == null) disabled @endif onchange="ajaxChained('#district','#village','village')">
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}" @if($district->id == $pengguna->district_id) selected @endif>{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Desa/Kelurahan <span class="text-danger">*</span></label>
                <select class="form-control select2" id="village" name="desa_kelurahan" @if($pengguna->village_id == null) disabled @endif>
                    <option value="">Pilih Desa/Kelurahan</option>
                    @foreach ($villages as $village)
                        <option value="{{ $village->id }}" @if($village->id == $pengguna->village_id) selected @endif>{{ $village->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Kode Pos <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="{{ $pengguna->kode_pos }}"/>
            </div>

            <div class="form-group">
                <label for="">Bank Sampah <span class="text-danger">*</span></label>
                <select class="form-control select2" name="bank_sampah" id="bank_sampah">
                    <option value="">Pilih Bank Sampah</option>
                    @foreach ($bankSampahList as $bankSampah)
                        <option value="{{ $bankSampah->id }}" @if($bankSampah->id == $pengguna->bank_sampah_id) selected @endif>{{ $bankSampah->nama }}</option>
                    @endforeach
                </select>
            </div>

            @if ($pengguna->pengguna_kategori_id)
            <div class="form-group">
                <label for="">Kategori Pengguna <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Kode Pos" value="{{ optional($pengguna->pengguna_kategori)->nama }}"/>
            </div>   
            @endif

            @if ($pengguna->kader_kategori_id)
            <div class="form-group">
                <label for="">Kategori Kader <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Kode Pos" value="{{ optional($pengguna->kader_kategori)->nama }}"/>
            </div>
            @endif

            <a href="{{ route('pengguna.profile') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\PenggunaProfileUpdate',  '#pengguna-profile-update') !!}

            <script>                
                function ajaxChained(source, target, slug){
                    var pid = $(source + ' option:selected').val(); //$(this).val();
                
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('/') }}/'+ slug +'/'+ pid,
                        dataType: 'json',
                        data: { 
                            id : pid,
                            _token: "{{ csrf_token() }}",
                        }
                    }).done(function(response){
                        //get JSON
                
                        $(target).prop("disabled", true);
                
                        //generate <options from JSON
                        var list_html = '';
                        list_html += '<option value=""></option>';
                        $.each(response.data, function(i, item) {
                            list_html += '<option value='+response.data[i].id+'>'+response.data[i].name+'</option>';
                        });
                        
                        //replace <select2 with new options
                        $(target).html(list_html);
                        $(target).prop("disabled", false);
                        //change placeholder text
                        // $(target).select2({placeholder: response.data.length +' results'});
                        $(target).select2({placeholder: 'Select ' + slug});
                    });
                }
            </script>
        @endpush
    </x-card>
</x-app-layout>