<x-guest-layout>
    <x-slot name="type">
        <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
            <span class="font-weight-bold text-dark-50">Sudah punya akun?</span>
            <a href="{{ route('login') }}" class="font-weight-bold ml-2">Login</a>
        </div>
    </x-slot>
    
    <!--begin::Signup-->
    <div class="login-form">
        <div class="text-center mb-10">
            <h3 class="font-size-h1">Daftar</h3>
            <p class="text-muted font-weight-bold">Masukkan data diri anda</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <!--begin::Form-->
        <form class="form" action="{{ route('register') }}" method="POST" id="register">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Nama lengkap" name="name" autocomplete="off" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" autocomplete="off" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" />
            </div>
            <div class="form-group">
                <label class="checkbox mb-0">
                <input type="checkbox" name="agree" />
                <span></span>&nbsp; Saya setuju dengan
                <a href="#">&nbsp; syarat dan ketentuan yang berlaku.</a>
                </label>
            </div>
            <div class="form-group d-flex flex-wrap flex-center">
                <a href="{{ route('login') }}" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Batal</a>
                <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signup-->

    @push('page-scripts')
        {!! JsValidator::formRequest('App\Http\Requests\GuestRegisterStore',  '#register') !!}
    @endpush
</x-guest-layout>

