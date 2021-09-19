<x-guest-layout>
    <!--begin::Signup-->
    <div class="login-form">
        <div class="text-center mb-10">
            <h3 class="font-size-h1">Daftar</h3>
            <p class="text-muted font-weight-bold">Masukkan data diri anda</p>
        </div>
        <!--begin::Form-->
        <form class="form" action="{{ route('register') }}" method="POST" id="register">
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
</x-guest-layout>
