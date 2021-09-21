<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Kader
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form action="{{ route('pengguna.kader.store') }}" method="POST" id="kader-store">
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
                <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" placeholder="Pilih Tanggal Lahir" readonly style="width: 100%" />
            </div>

            <div class="form-group">
                <label for="">Jenis Kelamin <span class="text-danger">*</span></label>
                <div class="radio-inline">
                    <label class="radio">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" />
                        <span></span>
                        Laki-laki
                    </label>
                    <label class="radio">
                        <input type="radio" name="jenis_kelamin" value="Perempuan" />
                        <span></span>
                        Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="">Alamat <span class="text-danger">*</span></label>
                <textarea class="form-control" name="alamat" id="alamat"></textarea>
            </div>

            <div class="form-group">
                <label for="">Provinsi <span class="text-danger">*</span></label>
                <select class="form-control select2" id="province" name="provinsi" onchange="ajaxChained('#province','#city','city')">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Kabupaten/Kota <span class="text-danger">*</span></label>
                <select class="form-control select2" id="city" name="kabupaten_kota" disabled onchange="ajaxChained('#city','#district','district')">
                    <option value="">Pilih Kabupaten/Kota</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Kecamatan <span class="text-danger">*</span></label>
                <select class="form-control select2" id="district" name="kecamatan" disabled onchange="ajaxChained('#district','#village','village')">
                    <option value="">Pilih Kecamatan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Desa/Kelurahan <span class="text-danger">*</span></label>
                <select class="form-control select2" id="village" name="desa_kelurahan" disabled>
                    <option value="">Pilih Desa/Kelurahan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Kode Pos <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" />
            </div>

            <a href="{{ route('pengguna.kader.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\PenggunaKaderStore',  '#kader-store') !!}

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