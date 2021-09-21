<x-app-layout>
    <x-card>
        <x-slot name="title">
            Ubah Bank Sampah
        </x-slot>

        {{-- slot start --}}
        <div class="card card-custom">
            <!--begin::Form-->
            <form action="{{ route('admin.bank-sampah.update', ['bank_sampah' => $bankSampah->id]) }}" method="POST" id="bank-sampah-update">
                @csrf
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label for="">Nama Bank Sampah <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Bank Sampah" value="{{ $bankSampah->nama }}"/>
                </div>

                <a href="{{ route('admin.bank-sampah.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
            </form>
            <!--end::Form-->
            </div>
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\BankSampahUpdate',  '#bank-sampah-update') !!}
        @endpush
    </x-card>
</x-app-layout>