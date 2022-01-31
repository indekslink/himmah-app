@extends('layouts.main')

@include('partials.menubottom')
@include('partials.header.page',['title'=>'Profil'])

@section('title','Profil')

@section('content')
<div class="item ">

    <div class="d-flex align-items-center">
        <div class="parent-image-user  me-3">
            <img src="{{avatar($user->avatar)}}" alt="" class="img-thumbnail shadow rounded-circle">
        </div>
        <div>
            <div class="fw-bold lh-sm  mt-2">{{$user->name}}</div>

            <div class=" lh-sm mt-2 "><small>{{$user->status_user->name}}</small>
                <i id="penjelasanDataStatus" data-bs-toggle="dropdown" aria-expanded="false" class="bi bi-question-circle ms-1 cursor-pointer"></i>
                <ul class="dropdown-menu" style="max-width: 200px;" aria-labelledby="penjelasanDataStatus">
                    <div class="p-2">
                        <div class="mb-2">Status : <b>{{$user->status_user->name}}</b></div>
                        <div>{{$user->status_user->description}}</div>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="row g-0 align-items-center">
            <div class="col-lg-10 col-sm-9 col-8">
                <a href="" class="btn my-primary-bg-color-outline d-block w-100">Edit Profil</a>
            </div>
            <div class="col-lg-2 col-sm-3 col-4">
                <div class="d-flex justify-content-center">
                    <a href="{{route('buat_toko',emailLogin())}}" class=" text-decoration-none d-flex my-primary-color flex-column align-items-center ">
                        <i class="bi bi-bag-fill fs-5"></i>
                        <span>Toko Saya</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space-y my-4 bg-white"></div>
<div class="item">
    <div class="fw-bold my-primay-color-darken mb-2 text-center fs-3">
        Menu Admin
    </div>
    <div class="item-list cursor-pointer d-flex align-items-center ">

        <i class="bi bi-person me-3 fs-6"></i>
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Data Users</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
    <div onclick="filterAction(`{{route('manage.beranda')}}`)" class="item-list cursor-pointer d-flex align-items-center">

        <i class="bi bi-house-door me-3 fs-6"></i>
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Konten Beranda</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
    <div class="item-list cursor-pointer d-flex align-items-center ">

        <i class="bi bi-bag me-3 fs-6"></i>
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Himmah Store</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
    <div class="item-list cursor-pointer d-flex align-items-center ">

        <i class="bi bi-people me-3 fs-6"></i>
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Himmah Group</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
    <div class="item-list cursor-pointer d-flex align-items-center ">

        <i class="bi bi-people me-3 fs-6"></i>
        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Himmah Entrepeneur</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
</div>
@endsection

@section('style')

<style>
    .parent-image-user {
        width: calc(5vmin + 80px);

        height: calc(5vmin + 80px);
        object-fit: contain;

    }

    .parent-image-user img {
        width: 100%;
        height: 100%;
    }
</style>
@endsection