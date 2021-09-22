<x-app-layout>
    <x-card>
        <x-slot name="title">
            Import Kader
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form action="{{ route('pengguna.kader-import.store') }}" method="POST" id="kader-import-store" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">File Import Kader<span class="text-danger">*</span></label>
                <br>
                <input type="file" name="file" id="file"/>
            </div>

            <a href="{{ route('pengguna.kader.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\PenggunaKaderImportStore',  '#kader-import-store') !!}
        @endpush
    </x-card>
</x-app-layout>