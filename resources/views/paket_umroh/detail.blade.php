@extends('layouts.main')
@section('title',$data->judul)
@include('partials.header.page',['title'=>'Detail Paket','withBack'=>"yes"])
@section('content')
<div class="data-current-page d-none">{{route("home.paket-umroh")}}</div>
<!-- <div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('home.paket-umroh')}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">{{$data->judul}}</div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div>

    <div class="row g-4 justify-content-center">
        <div class="col-12">
            <img src="{{gambarPaketUmroh($data->gambar)}}" class="w-100 rounded-3">
        </div>
        <div class="col-12">
            <div class="fs-2 fw-bold mb-2">{{$data->judul}}</div>
            <div class="fs-4 mb-2">Rp. {{formatIDR($data->harga)}}</div>
            <div class="mb-2">{!! $data->deskripsi !!}</div>
        </div>
    </div>
</div>
@endsection