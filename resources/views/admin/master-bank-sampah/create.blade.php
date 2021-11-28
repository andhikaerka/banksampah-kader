<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Bank Sampah
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <form action="{{ route('admin.bank-sampah.store') }}" method="POST" id="bank-sampah-store">
            @csrf
            
            <div class="form-group">
                <label for="">Nama Bank Sampah <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Bank Sampah"/>
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
                <select class="form-control select2" id="city" name="kabupaten_kota" disabled>
                    <option value="">Pilih Kabupaten/Kota</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <a href="{{ route('admin.bank-sampah.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\BankSampahStore',  '#bank-sampah-store') !!}

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