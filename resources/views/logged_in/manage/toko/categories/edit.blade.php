@extends('layouts.main')
@section('title','Edit Kategori')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Edit Kategori</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 5rem;">
    <form action="{{route('categories.update',[emailLogin(),$category->slug])}}" onsubmit="toggleLoadingAction()" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-4 align-items-center">
            <div class="col-4">
                <img src="{{avatar($category->gambar,'/images/store/kategori/')}}" alt="preview gambar" class="preview img-fluid img-thumbnail">
                <small class="text-info img-default">*Gambar default</small>
            </div>
            <div class="col-8">
                <div>
                    <label for="formFile" class="form-label">Upload File</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{$category->gambar}}" type="file" id="formFile">
                    @error('gambar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('nama') ?? $category->nama}}" required type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="inputnama" placeholder="name@example.com">
            <label for="inputnama">Nama <sup class="text-danger">*</sup></label>
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-end">

            <a href="{{route('paket-umroh.show',$category->slug)}}" class="btn btn-danger me-2">Batal</a>
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
</div>
@endsection
<!-- end Kontent Home -->

@section('script')


<script>
    const preview = document.querySelector('img.preview');
    const inputGambar = document.querySelector('input#formFile');
    const infoDefault = document.querySelector('small.img-default');
    inputGambar.addEventListener('change', function(e) {
        const [file] = e.target.files

        if (file) {
            preview.src = URL.createObjectURL(file)
            infoDefault.classList.add('d-none');
        }
    })
</script>

@endsection