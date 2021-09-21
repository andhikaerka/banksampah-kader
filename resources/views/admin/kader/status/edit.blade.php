<x-app-layout>
    <x-card>
        <x-slot name="title">
            Ubah Status
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <form action="{{ route('admin.kader-status.update', ['kader_status' => $kader_status->id]) }}" method="POST" id="kader-status-update">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label for="">Nama Status <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Status" value="{{ $kader_status->nama }}"/>
            </div>

            <a href="{{ route('admin.kader-status.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\KaderStatusUpdate',  '#kader-status-update') !!}
        @endpush
    </x-card>
</x-app-layout>