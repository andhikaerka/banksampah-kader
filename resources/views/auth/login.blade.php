<x-guest-layout>

    <x-slot name="type">
        <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
            <span class="font-weight-bold text-dark-50">Belum punya akun?</span>
            <a href="{{ route('register') }}" class="font-weight-bold ml-2">Daftar</a>
        </div>
    </x-slot>

    <!--begin::Signin-->
    <div class="login-form login-signin">
        <div class="text-center mb-10">
            {{-- <img src="{{ asset('assets/media/logos/logo-letter-1.png') }}" class="max-h-80px max-w-90px mb-5" alt="" /> --}}
            <h3 class="font-size-h1">Login</h3>
            <p class="text-muted font-weight-bold">Masukkan email dan pasword</p>
        </div>
        <!--begin::Form-->
        <form class="form" action="{{ route('login') }}" method="POST" id="login">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off" value="{{ old('email') }}" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" autocomplete="off" />
            </div>
            <!--begin::Action-->
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <a href="{{ route('password.request') }}" class="text-dark-50 text-hover-primary my-3 mr-2">Lupa Password ?</a>
                <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Login</button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->

    @push('page-scripts')
        {!! JsValidator::formRequest('App\Http\Requests\GuestLoginStore',  '#login') !!}
    @endpush
</x-guest-layout>