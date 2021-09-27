<x-app-layout>
    <x-card>
        <x-slot name="title">
            Ganti Password
        </x-slot>

        {{-- slot start --}}
        <!--begin::Form-->

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        
        <form action="{{ route('ganti.password.store') }}" method="POST" id="ganti-password">
            @csrf

            <div class="form-group">
                <label for="">Password Lama <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Password Lama"/>
            </div>

            <div class="form-group">
                <label for="">Password Baru <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Password Baru"/>
            </div>

            <div class="form-group">
                <label for="">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="konfirmasi_password_baru" id="konfirmasi_password_baru" placeholder="Konfirmasi Password Baru"/>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
        <!--end::Form-->
        {{-- slot end --}}

        @push('page-scripts')
            {!! JsValidator::formRequest('App\Http\Requests\GantiPasswordStore',  '#ganti-password') !!}
        @endpush
    </x-card>
</x-app-layout>