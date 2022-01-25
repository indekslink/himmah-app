@extends('layouts.myauth')
@section('title','Daftar')
@include('partials.header.himmahGroup')
@section('content')

<img src="{{asset('/images/LOGO-HIMMAH-GROUP.png')}}" alt="logo himmah" class="card-img-top mx-auto logo">
<div class="text-center my-2">

    <div class="fs-1 fw-bold">Daftar</div>

</div>
<div class="card-body px-0">
    <form method="POST" action="{{ route('register') }}" onsubmit="toggleLoadingAction()">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name@example.com" name="name" autofocus required autocomplete="current-password" value="{{ old('name') }}">
            <label for="name">Nama Lengkap</label>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}" required autocomplete="off">
            <label for="email">Email </label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-floating mb-3 toggle-password">
            <input type="password" toggle-password="satu" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="name@example.com" name="password" required>
            <label for="password">Password</label>
            <i class="bi bi-eye-fill toggle-password" data-toggle-password="satu"></i>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-floating mb-3 toggle-password">
            <input type="password" toggle-password="dua" class="form-control  " id="password_confirmation" placeholder="name@example.com" name="password_confirmation" required autocomplete="new-password">
            <label for="password">Konfirmasi Password</label>
            <i class="bi bi-eye-fill toggle-password" data-toggle-password="dua"></i>
        </div>




        <div class="d-flex justify-content-between align-items-center mb-3">

            <button type="submit" class="btn w-100 my-primary-bg-color btn-lg">Daftar</button>

        </div>
        <div class="text-center">

            <span class="text-muted">Sudah punya akun?</span> <a class="btn-link my-primary-color text-decoration-none show-loading-logo-on-click" href="{{ route('login') }}">Login disini </a>

        </div>
    </form>
</div>



@endsection