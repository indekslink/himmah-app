@extends('layouts.main')
@section('title','Produk')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('manage.shop.user',emailLogin())}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Kelola Produk</div>
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
    <a href="{{route('products.create',emailLogin())}}" class="btn btn-success">Tambah Data</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga</th>
                <th scope="col">Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>
                    @if($product->gambar)
                    <img class="fit-cover" src="{{avatar($product->gambar_utama,'/images/store/produk/')}}" style="width: 50px;height:50px;border-radius:10px;" alt="">
                    @else
                    -
                    @endif
                </td>
                <td>{{$product->nama}}</td>
                <td>{{$product->stok}} buah</td>
                <td>Rp. {{formatIDR($product->harga)}}</td>
                <td><a href="{{route('products.show',[emailLogin(),$product->slug])}}" class="btn btn-link  btn-sm"><i class="bi bi-eye fs-4"></i></a></td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">
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