@extends('layouts.main')
@section('title','Kategori')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('manage.shop.user',emailLogin())}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Kelola Kategori</div>
                </div>
            </div>
        </div>
    </div>
</div>


<div style="margin-top: 5rem;">
    @if(session('success'))
    <div class="alert alert-success mb-4 alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <a href="{{route('categories.create',emailLogin())}}" class="btn btn-success">Tambah Data</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Jumlah Produk</th>
                <th scope="col">Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                    @if($category->gambar == 'default.png')
                    <img src="{{avatar('store-bw.png','/images/')}}" style="width: 50px;height:50px;border-radius:10px;" alt="">
                    @else
                    <img src="{{avatar($category->gambar,'/images/store/kategori/')}}" style="width: 50px;height:50px;border-radius:10px;" alt="">

                    @endif
                </td>
                <td>{{$category->nama}}</td>
                <td>{{$category->products_count}} Produk</td>
                <td><a href="{{route('categories.show',[emailLogin(),$category->slug])}}" class="btn btn-link  btn-sm"><i class="bi bi-eye fs-4"></i></a></td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">
                    Data masih kosong !
                </td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>
@endsection
<!-- end Kontent Home -->
@section('style')
<style>
    table td,
    table th {

        vertical-align: middle;
        text-align: center;
    }
</style>
@endsection