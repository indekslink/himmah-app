@extends('layouts.main')
@section('title','Company Profile')

@section('content')
@include('partials.header.himmahGroup',['withBack'=>'yes'])
<!-- <div class=" py-2 nav-header sticky-top text-center">
    <i data-current-page="{{route('home')}}" class="bi bi-arrow-left-short icon-back"></i>
    <div class="fs-4 fw-bold">Company Profile</div>
</div> -->
@if($data)
@if($data->default_design == '1')

<div class="value text-justify mt-4">
    <div class="mb-3 d-flex align-items-center">
        <img src="{{asset('/images/LOGO-HIMMAH.png')}}" class="me-4" style="width: 100px;height:100px;" alt="logo himmah">
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
<div class="row justify-content-center">
    @foreach(reverse_array(json_decode($data->deskripsi)) as $g)
    <div class="col-md-10 col-lg-8 col-12">
        <img src="{{avatar($g,'/images/company_profile/')}}" alt="" class="w-100">
    </div>

    @endforeach
</div>
@endif
@else
<div class="fs-4 mt-4 text-center">Data Profil Perusahaan Belum dibuat / Admin belum memilih desain yang akan diaktifkan</div>
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