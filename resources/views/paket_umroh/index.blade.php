@extends('layouts.main')
@section('title','Paket Umroh')

@section('content')
<div class=" py-2 nav-header sticky-top text-center">
    <i data-current-page="{{route('home')}}" class="bi bi-arrow-left-short icon-back"></i>
    <div class="fs-4 fw-bold">Paket Umroh</div>
</div>
<div class="mt-4">
    <div class="row g-4 justify-content-center">

        @forelse($paket_umroh as $pu)
        <div class="col-6">
            <div class="card card-item">
                <img src="{{gambarPaketUmroh($pu->gambar)}}" class="img-card" alt="...">
                <div class="card-body px-2 py-3">
                    <h5 class="card-title">{{$pu->judul}}</h5>
                    <p class="card-text">

                    </p>
                    <a href="{{route('home.paket-umroh.detail',$pu->slug)}}" class="btn btn-outline-success d-block rounded-3 btn-sm mx-auto d-inline-block">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty

        @endforelse
    </div>
</div>
@endsection

@section('style')
<style>
    .card-item {
        border-radius: 10px;
        overflow: hidden;
        border: none;
    }

    .card-item .img-card {
        object-fit: cover;
        width: 100%;
        border-radius: 10px;

    }
</style>
@endsection