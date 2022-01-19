@extends('layouts.main')
@section('title','Buat Toko')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('buat_toko',emailLogin())}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Buat Toko</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 5rem;" class="mb-5">
    <form action="{{route('store_shop',emailLogin())}}" onsubmit="toggleLoadingAction()" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-floating mb-4">

            <input required value="{{old('nama')}}" type="text" class="form-control @error('nama') is-invalid @enderror " name="nama" placeholder="Silahkan desain dan isi profil perusahaan anda disini." id="label" />
            <label for="label">Nama Toko <sup class="text-danger">*</sup></label>

            @error('nama')
            <div class="text-danger w-100">
                <small>{{ $message }}</small>
            </div>
            @enderror

        </div>

        <div class="form-floating mb-4">

            <input required value="{{old('no_telepon')}}" type="text" class="form-control @error('no_telepon') is-invalid @enderror " name="no_telepon" placeholder="Silahkan desain dan isi profil perusahaan anda disini." id="label" />
            <label for="label">No Telepon <sup class="text-danger">*</sup></label>

            @error('no_telepon')
            <div class="text-danger w-100">
                <small>{{ $message }}</small>
            </div>
            @enderror
            @if(!old('no_telepon') && !$errors->first('no_telepon'))
            <div class="text-info w-100">
                <small>etc : 08*********</small>
            </div>
            @endif

        </div>
        <div class="form-floating mb-4">

            <input required value="{{old('provinsi')}}" type="text" class="form-control @error('provinsi') is-invalid @enderror " name="provinsi" placeholder="Silahkan desain dan isi profil perusahaan anda disini." id="label" />
            <label for="label">Provinsi <sup class="text-danger">*</sup></label>

            @error('provinsi')
            <div class="text-danger w-100">
                <small>{{ $message }}</small>
            </div>
            @enderror

        </div>
        <div class="form-floating mb-4">

            <input required value="{{old('kota')}}" type="text" class="form-control @error('kota') is-invalid @enderror " name="kota" placeholder="Silahkan desain dan isi profil perusahaan anda disini." id="label" />
            <label for="label">Kota <sup class="text-danger">*</sup></label>

            @error('kota')
            <div class="text-danger w-100">
                <small>{{ $message }}</small>
            </div>
            @enderror

        </div>
        <div class="form-floating mb-4">
            <textarea value="{{old('alamat')}}" name="alamat" class="form-control @error('alamat') is-invalid @enderror " placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px"></textarea>
            <label for="floatingTextarea2">Alamat <sup class="text-danger">*</sup></label>
            @error('alamat')
            <div class="text-danger w-100">
                <small>{{ $message }}</small>
            </div>
            @enderror

        </div>

        <div class="mb-4">
            <div class="row">
                <div class="col-4">
                    <img src="{{avatar('default.png','/images/store/logo/')}}" alt="" class="img-fluid img-thumbnail img-preview-avatar">
                </div>
                <div class="col-8">
                    <div>
                        <label for="formFile" class="form-label">Pilih File</label>
                        <input required onchange="previewImage(event,'img.img-preview-avatar')" class="form-control" name="avatar" type="file" id="inputFile">
                    </div>
                </div>
                <div class="col-12">
                    @error('avatar')
                    <div class="text-danger">
                        <small>{{ $message }}</small>
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-end">

            <a href="{{route('buat_toko',[emailLogin()])}}" class="btn btn-danger me-2">Batal</a>
            <button class="btn btn-success" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
<!-- end Kontent Home -->