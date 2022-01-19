@extends('layouts.main')
@section('title','Tambah Data Produk')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('products.index',emailLogin())}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Tambah Data Produk</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 5rem;">
    <form action="{{route('products.store',emailLogin())}}" method="post" onsubmit="toggleLoadingAction()" enctype="multipart/form-data">
        @csrf


        <div class="mb-4">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row gy-4 align-items-center">
                <div class="col-12">
                    <div>
                        <label for="formFile" class="form-label">Upload dan Pilih gambar utama Anda <sup class="text-danger">*</sup></label></label>
                        <input required class="form-control @error('gambar') is-invalid @enderror" multiple name="gambar[]" type="file" id="formFile">

                    </div>
                </div>
                <div class="col-12 parent-preview py-3 d-none">
                    <div class="column">

                    </div>
                </div>
            </div>

            <input type="hidden" id="gambar_utama" name="gambar_utama">
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('nama') ?? ''}}" required type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="inputnama" placeholder="name@example.com">
            <label for="inputnama">Nama <sup class="text-danger">*</sup></label>
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('harga') ?? ''}}" required type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="inputharga" placeholder="name@example.com">
            <label for="inputharga">Harga <sup class="text-danger">*</sup></label>
            @error('harga')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('stok') ?? ''}}" required type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="inputstok" placeholder="name@example.com">
            <label for="inputstok">Stok <sup class="text-danger">*</sup></label>
            @error('stok')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="kategori">Pilih Kategori <sup class="text-danger">*</sup></label>
            <select class="form-select" id="kategori" name="kategori[]" multiple>
                <optgroup label="Kategori Toko Anda">

                    @forelse($kategori_anda as $ctg)
                    <option value="{{$ctg->id}}">{{$ctg->nama}}</option>
                    @empty
                    <option value="" disabled>Data Kategori masih kosong!</option>
                    @endforelse
                </optgroup>
                <optgroup label="Kategori yg terdaftar">

                    @forelse($kategori_toko_lainnya as $ktg)
                    <option value="{{$ktg->id}}">{{$ktg->nama}}</option>
                    @empty
                    <option value="" disabled>Data Kategori masih kosong!</option>
                    @endforelse
                </optgroup>
            </select>

        </div>

        <div class="form-floating mb-4">
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" style="height: 50vmin;" placeholder="Deskripsi Produk" id="deskripsi" required>
            {{old('deskripsi') ?? ''}}
            </textarea>
            <label for="deskripsi"></label>
            @error('deskripsi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <div class="d-flex align-items-center justify-content-end mb-4">

            <a href="{{route('products.index',emailLogin())}}" class="btn btn-danger me-2">Batal</a>
            <button class="btn btn-success" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
<!-- end Kontent Home -->

@section('style')
<style>
    .parent-preview {
        max-height: 70vh;
        overflow: hidden auto;
    }

    .parent-preview .item-preview {
        display: inline-block;
        margin-bottom: 1.5rem;
        position: relative;
        width: 100%;
    }



    .parent-preview .column {
        columns: 2;
        column-gap: 1.5rem;
    }

    .parent-preview .item-preview::after {
        content: "";
        position: absolute;
        z-index: 2;
        inset: 0;
        opacity: 0;
        transition: .5s ease-in-out;
        background-color: rgba(0, 0, 0, 0.8);
    }

    .parent-preview .item-preview i {
        position: absolute;
        top: 50%;
        z-index: 3;
        transition: .5s ease-in-out;
        opacity: 0;
        left: 50%;
        font-size: 3rem;
        color: white;
        z-index: 3;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }

    .parent-preview .item-preview.active::after,
    .parent-preview .item-preview.active i {
        opacity: 1;
    }
</style>
@endsection

@section('script')

<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    // const preview = document.querySelector('img.preview');
    const inputGambar = document.querySelector('input#formFile');
    const infoDefault = document.querySelector('small.img-default');
    const parentPreview = document.querySelector(".parent-preview");
    const gambar_utama = document.querySelector('input#gambar_utama');
    let arrFile = [];

    inputGambar.addEventListener('change', function(e) {
        const filesImg = e.target.files;
        preview(filesImg);
    })

    function preview(data) {
        if (data.length > 0) {

            parentPreview.classList.remove('d-none');
        } else {
            parentPreview.classList.add('d-none');
        }
        let content = '';

        for (let index = 0; index < data.length; index++) {
            let element = data[index];
            content += itemPreview(URL.createObjectURL(element), element.name)
        }

        parentPreview.children[0].innerHTML = content;
        arrFile = data;
        gambar_utama.value = '';
    }

    function itemPreview(src, name) {
        return `
        <div class="item-preview" onclick="selected(this,'${name}')">
            <img src="${src}" alt="Gambar Kategori" class="preview w-100 img-thumbnail">
            <i class="bi bi-check2"></i>
        </div>
        `;
    }

    function selected(e, name) {
        const items = document.querySelectorAll('.parent-preview .item-preview');
        const gambar_utama = document.querySelector('input#gambar_utama');
        items.forEach(item => {
            item.classList.remove('active')
        });
        e.classList.add('active');
        gambar_utama.value = name;

    }


    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endsection