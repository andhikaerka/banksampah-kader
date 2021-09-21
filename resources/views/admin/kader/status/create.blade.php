<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Status
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <form action="{{ route('admin.kader-status.store') }}" method="POST" id="kader-status-store">
            @csrf
            
            <div class="form-group">
                <label for="">Nama Status <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Status"/>
            </div>

            <a href="{{ route('admin.kader-status.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\KaderStatusStore',  '#kader-status-store') !!}
        @endpush
    </x-card>
</x-app-layout>