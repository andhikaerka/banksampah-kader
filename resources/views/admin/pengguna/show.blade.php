<x-app-layout>
    <x-card>
        <x-slot name="title">
            Approval Pengguna
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->
        <form action="{{ route('admin.approval', ['pengguna' => $pengguna->id]) }}" method="POST" id="barang-store">
            @csrf
            
            <div class="form-group row">
                <label class="col-2 col-form-label">Nama</label>
                <div class="col-10">
                    <h5>Andhika</h5>
                </div>
            </div>

            <a href="{{ route('admin.barang.index') }}" class="btn btn-secondary mr-2">Batal</a>
            <button type="submit" class="btn btn-primary mr-2" value="setuju">Setujui</button>
            <button type="submit" class="btn btn-danger mr-2" value="tidak-setuju">Tidak Setujui</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\BarangStore',  '#barang-store') !!}
        @endpush
    </x-card>
</x-app-layout>