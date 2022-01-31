@extends('layouts.main')
@section('title','Edit Paket Umroh')
@include('partials.header.page',['title'=>'Edit Paket Umroh','withBack'=>"yes"])
@section('content')
<!-- <div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('paket-umroh.index')}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Edit {{$data->judul}}</div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="data-current-page d-none">{{route("paket-umroh.show",$data->slug)}}</div>
<div>
    <form action="{{route('paket-umroh.update',$data->slug)}}" onsubmit="toggleLoadingAction()" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-4 align-items-center">
            <div class="col-4">
                <img src="{{gambarPaketUmroh($data->gambar)}}" alt="preview gambar" class="preview img-fluid img-thumbnail">
                <small class="text-info img-default">*Gambar default</small>
            </div>
            <div class="col-8">
                <div>
                    <label for="formFile" class="form-label">Upload File</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{$data->gambar}}" type="file" id="formFile">
                    @error('gambar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('judul') ?? $data->judul}}" required type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="inputJudul" placeholder="name@example.com">
            <label for="inputJudul">Judul <sup class="text-danger">*</sup></label>
            @error('judul')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('harga') ?? $data->harga}}" required type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="inputHarga" placeholder="name@example.com">
            <label for="inputHarga">Harga <sup class="text-danger">*</sup></label>
            @error('harga')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="mb-4">
            <label for="inputDeskripsi" class="form-label">Deskripsi <sup class="text-danger">*</sup></label>
            <textarea required name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="inputDeskripsi" rows="5">
            {{old('deskripsi') ?? $data->deskripsi}}
            </textarea>
            @error('deskripsi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="d-flex align-items-center justify-content-end">

            <a href="{{route('paket-umroh.show',$data->slug)}}" class="btn btn-danger me-2">Batal</a>
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
</div>
@endsection
<!-- end Kontent Home -->

@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>

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


    ClassicEditor
        .create(document.querySelector('#inputDeskripsi'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection