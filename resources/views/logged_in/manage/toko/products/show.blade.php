@extends('layouts.main')
@section('title','Detail Produk')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Detail Produk</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 5rem;">
    <div class="row mb-4">
        <div class="col-6">
            <form action="{{route('products.destroy',[emailLogin(),$data->slug])}}" method="post" onsubmit="toggleLoadingLogo(event,'Apakah anda yakin ingin menghapus data ini ?')">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger d-block w-100" type="submit">Hapus</button>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('products.edit',[emailLogin(),$data->slug])}}" class="btn btn-warning d-block">Edit</a>
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
            <strong>Nama</strong>
        </div>
        <div class="col-6 text-end">
            {{$data->nama}}
        </div>
    </div>
    <div class="row py-4 border-bottom align-items-center">
        <div class="col-6">
            <strong>Harga</strong>
        </div>
        <div class="col-6 text-end">
            Rp. {{formatIDR($data->harga)}}
        </div>
    </div>
    <div class="row py-4 border-bottom align-items-center">
        <div class="col-6">
            <strong>Stok</strong>
        </div>
        <div class="col-6 text-end">
            {{$data->stok}}
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




    <div class="row py-4 border-bottom align-items-center">
        <div class="col-6">
            <strong>Gambar Utama</strong>
        </div>
        <div class="col-6 text-end">
            @if($data->gambar_utama)
            <img src="{{avatar($data->gambar_utama,'/images/store/produk/')}}" alt="" class="img-fluid">
            @else
            -
            @endif
        </div>
    </div>
    <div class="row py-4 border-bottom align-items-center">
        <div class="col-6">
            <strong>Gambar Lainnya</strong>
        </div>
        <div class="col-6 text-end">
            <div class="row g-3 justify-content-end">
                @foreach(json_decode($data->gambar) as $g)
                @if($g != $data->gambar_utama)
                <div class="col-6">
                    <img src="{{avatar($g,'/images/store/produk/')}}" alt="" class="w-100">
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="row py-4  align-items-center">
        <div class="col-6 mb-3">
            <strong>Deskripsi Produk</strong>
        </div>
        <div class="col-12">
            {!! $data->deskripsi !!}
        </div>
    </div>
</div>
@endsection