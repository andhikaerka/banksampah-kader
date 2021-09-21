<x-app-layout>
    <x-card>
        <x-slot name="title">
            Tambah Bank Sampah
        </x-slot>

        {{-- slot start --}}
        <div class="card card-custom">
            <!--begin::Form-->
            <form action="{{ route('admin.bank-sampah.update', ['banksampah' => 123]) }}" method="POST" id="bank-sampah-store">
                @csrf
                
                <div class="form-group">
                    <label for="">Nama Bank Sampah <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Bank Sampah"/>
                </div>

                <a href="{{ route('admin.bank-sampah.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
            </form>
            <!--end::Form-->
            </div>
        {{-- slot end --}}
    </x-card>
</x-app-layout>