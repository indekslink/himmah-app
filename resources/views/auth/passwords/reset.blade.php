@extends('layouts.myauth')
@section('title','Password Baru')

@section('content')

<img src="{{asset('/images/LOGO-HIMMAH.png')}}" alt="logo himmah" class="card-img-top mx-auto logo">
<div class="text-center my-2">

    <div class="fs-1 fw-bold">Masukkan Password Baru Anda</div>

</div>
<div class="card-body px-0">
    <form method="POST" action="{{ route('password.update') }}" onsubmit="toggleLoadingAction()">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ $email ?? old('email') }}" name="email" autofocus required autocomplete="off" readonly>
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

            <button type="submit" class="btn d-block w-100 btn-success btn-lg">Simpan</button>

        </div>

    </form>
</div>



@endsection