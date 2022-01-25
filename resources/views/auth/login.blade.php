@extends('layouts.myauth')
@section('title','Login')
@include('partials.header.himmahGroup')
@section('content')

<img src="{{asset('/images/LOGO-HIMMAH-GROUP.png')}}" alt="logo himmah" class="card-img-top mx-auto logo">
<div class="text-center my-2">

    <div class="fs-1 fw-bold">Login</div>

</div>
@error('credentials')
<div class="alert alert-danger mt-4 alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@enderror
<div class="card-body px-0">
    <form method="POST" action="{{ route('login') }}" onsubmit="toggleLoadingAction()">
        @csrf
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" name="email" autocomplete="off" autofocus required>
            <label for="email">Email </label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-3 toggle-password">
            <input type="password" toggle-password="satu" class="form-control   @error('password') is-invalid @enderror" id="password" placeholder="name@example.com" name="password" required>
            <label for="password">Password</label>
            <i class="bi bi-eye-fill toggle-password" data-toggle-password="satu"></i>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="d-flex justify-content-end align-items-center mb-3">
            <!-- <div class="form-check3">
                <input class="form-check-input " type="checkbox" id="flexCheckDefault" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                </label>

            </div> -->

            @if (Route::has('password.request'))
            <a class="btn-link text-muted text-decoration-none show-loading-logo-on-click" href="{{ route('password.request') }}">
                Lupa Password?
            </a>
            @endif
        </div>
        <button type="submit" class="btn w-100 my-primary-bg-color mb-3 btn-lg">Login</button>
        <div class="text-center mb-2">

            <span class="text-muted">Belum punya akun?</span> <a class="btn-link text-decoration-none my-primary-color  show-loading-logo-on-click" href="{{ route('register') }}">Daftar disini </a>

        </div>
        <div class="text-center">

            <a style="line-height:0;" class="btn-link text-decoration-none d-flex align-items-center justify-content-center text-muted show-loading-logo-on-click" href="/"> <i class="bi bi-arrow-left-short fs-3"></i> Kembali ke Halaman Beranda </a>

        </div>
    </form>
</div>



@endsection