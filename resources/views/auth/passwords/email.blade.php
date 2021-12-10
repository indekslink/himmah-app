@extends('layouts.myauth')
@section('title','Lupa password')

@section('content')
<!-- <i class="bi bi-arrow-left-short icon-back text-success"></i> -->
<img src="{{asset('/images/LOGO-HIMMAH.png')}}" alt="logo himmah" class="card-img-top mx-auto logo">
<div class="text-center my-2">

    <div class="fs-1 fw-bold">Lupa Password</div>

</div>
<div class="card-body px-0">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
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

        <div class="d-flex justify-content-between align-items-center mb-3">
            <button type="submit" class="btn btn-success btn-lg">Kirim link reset password</button>
        </div>

    </form>
</div>



@endsection