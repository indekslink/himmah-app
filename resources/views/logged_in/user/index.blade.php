@extends('layouts.main')

@include('partials.menubottom')

@section('title','Profile')


@section('content')

<!-- section untuk all role user -->


<!-- section manajemen kontent untuk bila terdeteksi sebagai admin -->
<!-- Kontent Home -->
<div class="card menu my-2">
    <div class="card-header fs-5 sticky-top ps-0 fw-bold bg-white">Profil</div>
    <div class="card-body  p-0">
        <div class="py-2 item bg-white">

            <div class="row align-items-center">
                <div class="col-4">
                    <img src="{{avatar($user->avatar)}}" alt="" class="img-fluid img-thumbnail">
                </div>
                <div class="col-8">
                    <div class="fs-3 lh-sm mb-2">{{$user->name}}</div>
                    <div class=" lh-sm mb-2 ">{{$user->status_user->name}}
                        <i id="penjelasanDataStatus" data-bs-toggle="dropdown" aria-expanded="false" class="bi bi-question-circle ms-2 cursor-pointer"></i>
                        <ul class="dropdown-menu" style="max-width: 200px;" aria-labelledby="penjelasanDataStatus">
                            <div class="p-2">
                                <div class="mb-2">Status : <b>{{$user->status_user->name}}</b></div>
                                <div>{{$user->status_user->description}}</div>
                            </div>
                        </ul>
                    </div>
                    <div class=" lh-sm mb-2">{{$user->address}}</div>
                </div>
            </div>
        </div>
        <a href="{{route('user.setting',$user->email)}}" class="item py-2 bg-white d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">

                <i class="bi bi-gear  gambar"></i>
                <div class=" lh-sm ms-4">Pengaturan Akun</div>
            </div>
            <i class="bi bi-chevron-right fs-4"></i>
        </a>
        <a href="{{route('konten')}}" class="item py-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <i class="bi bi-sliders gambar"></i>
                    <div class=" lh-sm ms-4">Lainnya</div>
                </div>
                <i class="bi bi-chevron-right fs-4"></i>
            </div>
        </a>
    </div>
</div>
<!-- end Kontent Home -->
<div class="space-y bg-light "></div>

<div class="card menu my-2">
    <div class="card-header  sticky-top ps-0 fw-bold bg-white">
        <div class="fs-5">Himmah Store</div>

    </div>
    <div class="card-body bg-light p-0">
        <a href="{{route('manage.shop.user',auth()->user()->email)}}" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <i class="bi bi-shop gambar"></i>
                    <div class=" lh-sm ms-4">Toko Saya</div>
                </div>
                <i class="bi bi-chevron-right fs-4"></i>
            </div>
        </a>

    </div>
</div>
<div class="space-y bg-light "></div>
@if(in_array(auth()->user()->role->name,$section_admin))
<!-- Kontent Home -->

<div class="card menu my-2">
    <div class="card-header  sticky-top ps-0 fw-bold bg-white">
        <div class="fs-5">Menu Admin</div>
        <!-- <small class="text-success d-block lh-sm">*Section dibawah ini berfungsi untuk mengelola konten yang terdapat pada menu beranda</small> -->
    </div>
    <div class="card-body bg-light p-0">
        <a href="{{route('manage.company.profile')}}" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <i class="bi bi-bank2 gambar"></i>
                    <div class=" lh-sm ms-4">Profil Perusahaan</div>
                </div>
                <i class="bi bi-chevron-right fs-4"></i>
            </div>
        </a>
        <a href="{{route('paket-umroh.index')}}" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <i class="bi bi-card-list gambar"></i>
                    <div class=" lh-sm ms-4">Paket Umroh</div>
                </div>
                <i class="bi bi-chevron-right fs-4"></i>
            </div>
        </a>
        <a href="#" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <img class="gambar" src="{{asset('/images/LOGO-HIMMAH-STORE.png')}}" alt="">
                    <div class=" lh-sm ms-4">Himmah Store</div>
                </div>
                <i class="bi bi-chevron-right fs-4"></i>
            </div>
        </a>
        <a href="#" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <img class="gambar" src="{{asset('/images/LOGO-HIMMAH-GROUP.png')}}" alt="">
                    <div class=" lh-sm ms-4">Himmah Group</div>
                </div>
                <i class="bi bi-chevron-right fs-4"></i>
            </div>
        </a>
        <a href="#" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <i class="bi bi-house-door gambar"></i>
                    <div class=" lh-sm ms-4">Pondok Megono</div>
                </div>
                <i class="bi bi-chevron-right fs-4"></i>
            </div>
        </a>
        <a href="#" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <i class="bi bi-compass gambar"></i>
                    <div class=" lh-sm ms-4">Kompas</div>
                </div>
                <i class="bi bi-chevron-right fs-4"></i>
            </div>
        </a>
        <a href="{{route('konten')}}" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">
                <div class="d-flex align-items-center">

                    <i class="bi bi-sliders gambar"></i>
                    <div class=" lh-sm ms-4">Lainnya</div>
                </div>
                <i class="bi bi-chevron-right fs-4"></i>
            </div>
        </a>
    </div>
</div>

<div class="space-y bg-light "></div>
<!-- end Kontent Home -->
@endif
<div class="card mt-4">
    <div class="item p-2 text-center">
        <form action="{{route('logout')}}" onsubmit="toggleLoadingLogo(event,'Apakah anda ingin keluar dari Aplikasi ?')" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-light d-block w-100 text-dark">Logout</button>
        </form>
    </div>
</div>
<small class="text-center d-block mt-4 text-muted">
    Himmah v 1.0.0 &copy; All Rights Reserved
</small>
@endsection