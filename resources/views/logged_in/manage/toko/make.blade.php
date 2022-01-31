@extends('layouts.main')
@section('title','Buat Toko')



@section('content')
<div>
    <img src="/images/LOGO-HIMMAH-STORE.png" style="width: calc(2vw + 200px);" alt="" class="d-block mx-auto  mt-5 img-fluid">
    <h1 class="mt-5 text-center fw-normal lh-base">Mari Bergabung dengan <br><b class="font-logo">HIMMAH STORE</b>. <br> Buka Toko Pribadi Anda disini.</h1>

    <div class="mt-5 text-center">
        <a href="{{route('form_buat_toko',emailLogin())}}" class="btn my-primary-bg-color btn-lg   d-inline-block mx-auto">Buat Sekarang</a>
    </div>
    <a href="{{route('user.index',emailLogin())}}" class="text-danger my-4 d-block w-100 text-decoration-none text-center">Kembali ke halaman Profil</a>




    <!-- <div class="space-y bg-light mt-4"></div> -->

</div>

@endsection