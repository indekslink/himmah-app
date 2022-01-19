@extends('layouts.main')
@section('title','Edit Data Toko')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('manage.shop.user',emailLogin())}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Edit Data Toko</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 5rem;">

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $e)
        <li>{{$e}}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{route('manage.shop.user.update',emailLogin())}}" onsubmit="toggleLoadingAction()" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-4 align-items-center">
            <div class="col-4">
                <img src="{{avatar($store->avatar,'/images/store/logo/')}}" alt="preview gambar" class="preview img-fluid img-thumbnail">

            </div>
            <div class="col-8">
                <div>
                    <label for="formFile" class="form-label">Upload File</label>
                    <input onchange="previewImage(event,'img.preview.img-fluid')" class="form-control @error('gambar') is-invalid @enderror" name="avatar" value="{{$store->gambar}}" type="file" id="formFile">
                    @error('gambar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('nama') ?? $store->nama}}" required type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="inputnama_toko" placeholder="name@example.com">
            <label for="inputnama_toko">Nama <sup class="text-danger">*</sup></label>
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('no_telepon') ?? $store->no_telepon}}" required type="text" name="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" id="inputno_telepon " placeholder="name@example.com">
            <label for="inputno_telepon">No Telepon <sup class="text-danger">*</sup></label>
            @error('no_telepon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('provinsi') ?? $store->provinsi}}" required type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror" id="inputprovinsi " placeholder="name@example.com">
            <label for="inputprovinsi">Provinsi <sup class="text-danger">*</sup></label>
            @error('provinsi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('kota') ?? $store->kota}}" required type="text" name="kota" class="form-control @error('kota') is-invalid @enderror" id="inputkota " placeholder="name@example.com">
            <label for="inputkota">Kota <sup class="text-danger">*</sup></label>
            @error('kota')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <textarea style="height: 200px" required name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="inputalamat " placeholder="name@example.com">{{old('alamat') ?? $store->alamat}}</textarea>
            <label for="inputalamat">Alamat <sup class="text-danger">*</sup></label>
            @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-end mb-4">

            <a href="{{route('manage.shop.user',[emailLogin()])}}" class="btn btn-danger me-2">Batal</a>
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
</div>
@endsection
<!-- end Kontent Home -->