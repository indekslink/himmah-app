@extends('layouts.myauth')
@section('title','Verifikasi Email Anda')

@section('content')

<img src="{{asset('/images/LOGO-HIMMAH-GROUP.png')}}" alt="logo himmah" class="card-img-top mx-auto logo">
<div class="text-center my-2">

    <div class="fs-1 fw-bold">Verifikasi Alamat Email Anda</div>

</div>
<div class="card-body px-0">
    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        Link Verifikasi berhasil dikirim kembali ke alamat email Anda.

    </div>
    @endif
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link text-success p-0 m-0 align-baseline">Kirim Ulang</button>
    </form>
</div>



@endsection