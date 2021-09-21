<x-guest-layout>

    <x-slot name="type">
        <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
            <span class="font-weight-bold text-dark-50">Belum punya akun?</span>
            <a href="{{ route('register') }}" class="font-weight-bold ml-2">Daftar</a>
        </div>
    </x-slot>

    <!--begin::Signin-->
    <div class="login-form">
        <div class="text-center mb-10">
            {{-- <img src="{{ asset('assets/media/logos/logo-letter-1.png') }}" class="max-h-80px max-w-90px mb-5" alt="" /> --}}
            <h3 class="font-size-h1">Lupa Password?</h3>
            <p class="text-muted font-weight-bold">Masukkan email</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        
        <!--begin::Form-->
        <form class="form" action="{{ route('password.email') }}" method="POST" id="forgot-password">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" />
            </div>
            <!--begin::Action-->
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <a href="{{ route('login') }}" class="btn btn-light-primary font-weight-bold px-9 py-4">Batal</a>
                <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Submit</button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->
</x-guest-layout>