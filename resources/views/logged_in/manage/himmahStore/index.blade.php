@extends('layouts.main')
@section('title','Kelola Toko')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('user.index',emailLogin())}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Kelola Toko</div>
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
    <div class="table-responsive mt-4">

        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Toko</th>
                    <th scope="col">Pemilik Toko</th>
                    <th scope="col">Dibuat pada</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stores as $store)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$store->nama}}</td>
                    <td>{{$store->user->name}}</td>
                    <td>
                        {{\Carbon\Carbon::parse($store->created_at)->format('d-m-Y')}} <br>
                        <small>{{\Carbon\Carbon::parse($store->created_at)->diffForHumans()}}</small>
                    </td>
                    <td>
                        @if($store->suspend)
                        <span class="badge bg-danger">Nonaktif</span>
                        @else
                        <div class="badge bg-success">Aktif</div>
                        @endif
                    </td>
                    <td><a href="{{route('store.show',$store->slug)}}" class="btn btn-link btn-sm">
                            <i class="bi bi-eye fs-4"></i>
                        </a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada User yang membuat Toko
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
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