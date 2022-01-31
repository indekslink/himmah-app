@extends('layouts.main')

@include('partials.menubottom')
@include('partials.header.page',['title'=>'Kelola Konten Beranda','withBack'=> "yes"])

@section('title','Kelola Konten Beranda')

@section('content')

<div class="data-current-page d-none">{{route("user.index",emailLogin())}}</div>

<div class="item">

    <div onclick="filterAction(`{{route('manage.company.profile')}}`)" class="item-list cursor-pointer d-flex align-items-center ">

        <img src="{{asset('/new/A.png')}}" class="icon-menu me-3" alt="menu-image">
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Profil Perusahaan</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
    <div onclick="filterAction(`{{route('manage.beranda')}}`)" class="item-list cursor-pointer d-flex align-items-center">

        <img src="{{asset('/new/B.png')}}" class="icon-menu me-3" alt="menu-image">
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Unit Bisnis</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
    <div onclick="filterAction(`{{route('paket-umroh.index')}}`)" class="item-list cursor-pointer d-flex align-items-center">

        <img src="{{asset('/new/C.png')}}" class="icon-menu me-3" alt="menu-image">
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Paket Haji & Umroh</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
    <div onclick="filterAction(`{{route('manage.beranda')}}`)" class="item-list cursor-pointer d-flex align-items-center">

        <img src="{{asset('/new/D.png')}}" class="icon-menu me-3" alt="menu-image">
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Galeri</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
    <div class="item-list cursor-pointer d-flex align-items-center ">

        <i class="bi bi-images me-3 fs-6"></i>
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Gambar Slide</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>

</div>
@endsection

@section('style')

<style>
    img.icon-menu {
        width: 16px;
    }
</style>
@endsection