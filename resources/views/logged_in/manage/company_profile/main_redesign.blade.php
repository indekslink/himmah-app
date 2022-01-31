@extends('layouts.main')

@include('partials.menubottom')
@include('partials.header.page',['title'=>'Kelola Profil Perusahaan','withBack'=>"yes"])

@section('title','Kelola Profil Perusahaan')

@section('content')

<div class="data-current-page d-none">{{route("manage.beranda")}}</div>
<div class="item">

    <div class="item-list cursor-pointer d-flex align-items-center ">


        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Ubah Logo Menu</small>
            <i class="float-end bi bi-chevron-right fs-6"></i>
        </div>

    </div>
    <div onclick="filterAction(`{{route('manage.company.profile.field','custom')}}`)" class="item-list cursor-pointer d-flex align-items-center ">


        <div class="border-secondary border-1 py-3 w-100 border-bottom">
            <small>Isi Konten</small>
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