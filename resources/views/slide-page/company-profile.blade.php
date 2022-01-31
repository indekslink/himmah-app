@extends('layouts.main')
@section('title','Profil Perusahaan')

@section('content')
@include('partials.header.page',['title'=>'Profil Perusahaan','withBack'=>'yes'])
<!-- <div class=" py-2 nav-header sticky-top text-center">
    <i data-current-page="{{route('home')}}" class="bi bi-arrow-left-short icon-back"></i>
    <div class="fs-4 fw-bold">Company Profile</div>
</div> -->
<div class="data-current-page d-none">{{route("home")}}</div>
<div class="text-center">
    <img src="{{asset('/images/LOGO-HIMMAH-GROUP.png')}}" class="me-4" style="width: 100px;height:100px;" alt="logo himmah">
    <div class=" my-primary-color-darken mt-3">
        <div class="fw-bold font-header fs-4">KANTOR PUSAT INFORMASI <br /> PT. HIJRAH MAKKAH MADINAH</div>
        <small class="d-block font-header fw-bold"> - BIRO PERJALANAN WISATA & UMROH - </small>
    </div>
    <div class="my-primary-color-darken fw-bold mt-2 mb-4"><small>SK PPIU IZIN NO. 91203054620550001</small></div>

    <!-- <div class="my-4 fs-2 fw-bold my-primay-color">
        Profil Perusahaan
    </div> -->
</div>
@if($data)
@if($data->default_design == '1')

<div class="value text-justify mt-4">
    <div class="mb-3 d-flex align-items-center">
        <img src="{{asset('/images/LOGO-HIMMAH-GROUP.png')}}" class="me-4" style="width: 100px;height:100px;" alt="logo himmah">
        <div class="lh-sm">

            <div class="fs-3 font-logo fw-bold">HIMMAH</div>
            <div class="fw-bold">PT. Hijrah Makkah Madinah</div>
        </div>
    </div>
    <p class="fs-3 text-start">{{$data->judul}}</p>
    <p>{{$data->deskripsi}}</p>

    <!-- visi- -->
    <div class="border-start border-3 border-success bg-light p-2 fs-3 ps-3 mb-2">
        Visi
    </div>
    <p>{{$data->visi}}</p>
    <!-- end visi  -->


    <!-- -misi -->
    <div class="border-start border-3 border-success bg-light p-2 fs-3 ps-3 mb-2">
        Misi
    </div>
    <p>{{$data->misi}}</p>
    <!-- end visi misi -->
</div>
@else
<div class="row justify-content-center gy-2 mb-2">
    @foreach(reverse_array(json_decode($data->deskripsi)) as $g)
    <div class="col-12">
        <img src="{{avatar($g,'/images/company_profile/')}}" alt="" class="w-100">
    </div>
    @endforeach
</div>
@endif

@endif
@endsection

@section('style')
<style>
    .value p {
        line-height: 1.4;
    }

    .text-justify {
        text-align: justify !important;
    }
</style>
@endsection