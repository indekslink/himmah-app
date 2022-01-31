@extends('layouts.main')
@section('title','Detail Paket Haji & Umroh')
@include('partials.header.page',['title'=> 'Detail Paket Haji & Umroh','withBack'=>"yes"])

@section('content')
<!-- <div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('paket-umroh.index')}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Detail Paket Umroh</div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="data-current-page d-none">{{route("paket-umroh.index")}}</div>
<div>
    <div class="row mb-4">
        <div class="col-6">
            <form action="{{route('paket-umroh.destroy',$data->slug)}}" method="post" onsubmit="toggleLoadingLogo(event,'Apakah anda yakin ingin menghapus data ini ?')">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger d-block w-100" type="submit">Hapus</button>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('paket-umroh.edit',$data->slug)}}" class="btn btn-warning d-block">Edit</a>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success mb-4 alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row py-4 border-bottom align-items-center">
        <div class="col-6">
            <strong>Judul</strong>
        </div>
        <div class="col-6 text-end">
            {{$data->judul}}
        </div>
    </div>
    <div class="row py-4 border-bottom align-items-center">
        <div class="col-6">
            <strong>Harga</strong>
        </div>
        <div class="col-6 text-end">
            {{formatIDR($data->harga)}}
        </div>
    </div>
    <div class="row py-4 border-bottom align-items-center">
        <div class="col-6">
            <strong>Deskripsi</strong>
        </div>
        <div class="col-6 text-end">
            {!! $data->deskripsi !!}
        </div>
    </div>
    <div class="row py-4 border-bottom align-items-center">
        <div class="col-6">
            <strong>Dibuat/Diupdate Tgl</strong>
        </div>
        <div class="col-6 text-end">
            {{$infoTgl}}
        </div>
    </div>
    <div class="row py-4 align-items-center">
        <div class="col-6">
            <strong>Gambar</strong>
        </div>
        <div class="col-6 text-end">
            <img src="{{gambarPaketUmroh($data->gambar)}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
@endsection