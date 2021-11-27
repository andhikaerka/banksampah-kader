<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Sponsor
        </x-slot>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- slot start --}}
        <!--begin::Form-->
        <form action="{{ route('admin.sponsor.store') }}" method="POST" id="sponsor-store" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="">Judul <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Sponsor"/>
            </div>

            <div class="form-group">
                <label for="">Lokasi <span class="text-danger">*</span></label>
                <select class="form-control" name="lokasi" id="lokasi">
                    <option value="">- Pilih Lokasi -</option>
                    <option value="header-menu">Header Menu</option>
                    <option value="sponsor-section">Sponsor Section</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Gambar <span class="text-danger">*</span></label>
                <br>
                <input type="file" name="gambar" id="gambar"/>
            </div>

            <div class="form-group">
                <label for="">URL</label>
                <input type="text" class="form-control" name="url" id="url" placeholder="Url"/>
            </div>

            <div class="form-group">
                <label for="">ALT Text</label>
                <input type="text" class="form-control" name="alt_text" id="alt_text" placeholder="Alternative Text"/>
            </div>

            <a href="{{ route('admin.sponsor.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\SponsorStore',  '#sponsor-store') !!}
        @endpush
    </x-card>
</x-app-layout>