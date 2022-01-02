@extends('layouts.main')
@section('title','Toko Saya')

@section('content')
<div>
    <!-- section header top -->
    <div class="d-flex align-items-center py-2 bg-white flex-wrap nav-header sticky-top justify-content-between">
        <div class="d-flex align-items-center logo-place">

            <i class="bi bi-shop fs-1 me-4"></i>

            <div class="text-center">

                <div class="fs-5 font-logo">Toko Saya</div>
            </div>
        </div>

    </div>
    <!-- end section header top -->


    <div class="card menu my-2">
        <div class="card-header  sticky-top ps-0 fw-bold bg-white">
            <div class="fs-5">Kelola</div>

        </div>
        <div class="card-body bg-light p-0">
            <a href="{{route('categories.index',emailLogin())}}" class="item p-2 ps-0 bg-white">
                <div class="top d-flex  align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class=" lh-sm">Kategori</div>
                    </div>
                    <i class="bi bi-chevron-right fs-4"></i>
                </div>
            </a>
            <a href="{{route('products.index',emailLogin())}}" class="item p-2 ps-0 bg-white">
                <div class="top d-flex  align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class=" lh-sm">Produk</div>
                    </div>
                    <i class="bi bi-chevron-right fs-4"></i>
                </div>
            </a>

        </div>
    </div>

    <div class="space-y bg-light mt-4"></div>

</div>

@endsection