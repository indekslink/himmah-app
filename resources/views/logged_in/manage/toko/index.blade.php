@extends('layouts.main')
@section('title','Toko Saya')

@include('partials.menubottom')


@section('content')
<div>
    <!-- section header top -->
    <div class="fixed-top bg-white shadow-sm">
        <div class="container py-2 px-3">

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="d-flex align-items-center  logo-place">

                        <i class="bi bi-shop fs-1 me-4"></i>

                        <div class="text-center">

                            <div class="fs-3 font-logo">{{auth()->user()->store->nama}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end section header top -->

    @if(session('success'))
    <div style="margin-top: 6rem;"></div>
    <div class="alert alert-success ">
        {{session('success')}}
    </div>
    @else
    <div style="margin-top: 4rem;"></div>
    @endif

    <div class="card menu my-2">
        <div class="card-header  sticky-top ps-0 fw-bold bg-white">
            <div class="fs-5">Informasi Toko</div>

        </div>
        <div class="card-body bg-light p-0">
            <div class="p-2 ps-0 bg-white">
                <div class="row align-items-center">
                    <div class="col-4">
                        <img src="{{avatar(auth()->user()->store->avatar,'/images/store/logo/')}}" alt="" class="img-fluid img-thumbnail">
                    </div>
                    <div class="col-8">
                        <div class="fs-3 lh-sm mb-4">{{auth()->user()->store->nama}}</div>

                        <div class="d-flex align-items-center">
                            <div class="item text-center me-4">
                                <div class="fw-bold mb-1">{{auth()->user()->store->products->count()}}</div>
                                <div>Produk</div>
                            </div>
                            <div class="item text-center me-2">
                                <div class="fw-bold mb-1">{{auth()->user()->store->categories->count()}}</div>
                                <div>Kategori</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{route('manage.shop.user.edit',emailLogin())}}" class="item p-2 ps-0 bg-white">
                <div class="top d-flex  align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class=" lh-sm">Edit Data Toko</div>
                    </div>
                    <i class="bi bi-chevron-right fs-4"></i>
                </div>
            </a>


        </div>
    </div>
    <div class="space-y bg-light "></div>

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

    <!-- <div class="space-y bg-light mt-4"></div> -->

</div>

@endsection