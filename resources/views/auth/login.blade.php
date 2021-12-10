@extends('layouts.myauth')
@section('title','Login')

@section('content')

<img src="{{asset('/images/LOGO-HIMMAH.png')}}" alt="logo himmah" class="card-img-top mx-auto logo">
<div class="text-center my-2">

    <div class="fs-1 fw-bold">Login</div>

</div>
<div class="card-body px-0">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" name="email" autofocus required autocomplete="current-password">
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

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check3">
                <input class="form-check-input " type="checkbox" id="flexCheckDefault" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefault">
                    Remember Me
                </label>

            </div>

            @if (Route::has('password.request'))
            <a class="btn-link text-success text-decoration-none" href="{{ route('password.request') }}">
                Lupa Password?
            </a>
            @endif
        </div>
        <button type="submit" class="btn w-100 btn-success mb-3 btn-lg">Login</button>
        <div class="text-center">

            Belum punya akun? <a class="btn-link text-decoration-none text-success" href="{{ route('register') }}">Daftar disini </a>

        </div>
    </form>
</div>



@endsection