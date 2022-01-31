@extends('layouts.main')
@section('title','Edit Data Produk')
@include('partials.header.page',['title'=>'Edit Data Produk','withBack'=>"yes"])
@section('content')
<div class="data-current-page d-none">{{route('products.update',[emailLogin(),$product->slug])}}</div>
<!-- <div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('products.index',emailLogin())}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Edit Data Produk</div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div>
    <form action="{{route('products.update',[emailLogin(),$product->slug])}}" method="post" onsubmit="toggleLoadingAction()" enctype="multipart/form-data">
        @csrf

        @method("PUT")

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="mb-4 card bg-tranparent rounded-3 p-2">
            <div class="mb-4    ">
                <button type="button" class="btn btn-outline-primary w-100" onclick="tambahGambar('{{$product->gambar}}')">Tambah Gambar</button>
            </div>
            <div class="parent-ubah-gambar">
                @foreach(json_decode($product->gambar) as $gambar)

                <div class="item" data-item="{{$loop->iteration}}">
                    <input type="hidden" name="gambar[]" class="nama-gambar-{{$loop->iteration}}" value="{{$gambar}}">

                    <img class="gambar-produk preview-gambar-{{$loop->iteration}}" src="{{avatar($gambar,'/images/store/produk/')}}" alt="gambar produk">

                    <div class="action-ubah-gambar py-2">


                        <div class="form-check mb-2">
                            <input onchange="selectedImage('.nama-gambar-{{$loop->iteration}}','radio-{{$loop->iteration}}')" name="radio-gambar-utama" class=" form-check-input pilih-gambar-utama" type="radio" id="radio-{{$loop->iteration}}" {{$gambar == $product->gambar_utama ? 'checked' : ''}}>
                            <label class="form-check-label text-truncate w-100 label-radio-gambar-utama" for="radio-{{$loop->iteration}}">
                                {{$gambar == $product->gambar_utama ? 'Terpilih sbg Gambar Utama' : 'Pilih sbg Gambar Utama'}}
                            </label>
                        </div>


                        <div class="row g-2">
                            <div class="col-6 action-ubah">
                                <button type="button" class="btn text-truncate  btn-warning btn-sm d-block w-100">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <input type="file" name="gambar_pengganti[]" onchange="previewGambar(event,'img.preview-gambar-{{$loop->iteration}}','input.nama-gambar-{{$loop->iteration}}','radio-{{$loop->iteration}}')">
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn  text-truncate btn-outline-danger btn-sm d-block w-100" onclick="removeItem('{{$loop->iteration}}','radio-{{$loop->iteration}}')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>


                    </div>
                </div>

                @endforeach
            </div>

            <input type="hidden" id="gambar_utama" value="{{$product->gambar_utama}}" name="gambar_utama">
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('nama') ?? $product->nama}}" required type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="inputnama" placeholder="name@example.com">
            <label for="inputnama">Nama <sup class="text-danger">*</sup></label>
            @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('harga') ?? $product->harga}}" required type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" id="inputharga" placeholder="name@example.com">
            <label for="inputharga">Harga <sup class="text-danger">*</sup></label>
            @error('harga')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input value="{{old('stok') ?? $product->stok}}" required type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" id="inputstok" placeholder="name@example.com">
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
                @foreach($product->categories as $p)
                <option value="{{$p->id}}" selected>{{$p->nama}}</option>
                @endforeach
                @foreach($category as $c)
                <option value="{{$c->id}}">{{$c->nama}}</option>
                @endforeach
            </select>

        </div>

        <div class="form-floating mb-4">
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" style="height: 50vmin;" placeholder="Deskripsi Produk" id="deskripsi" required>
            {{old('desripsi') ?? $product->deskripsi}}
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
            <button class="btn my-primary-bg-color" type="submit">Simpan</button>
        </div>
    </form>
</div>
@endsection
<!-- end Kontent Home -->

@section('style')
<style>
    .action-ubah-gambar {
        font-size: 13px;
    }

    .parent-ubah-gambar {
        display: flex;
        overflow: auto hidden;
        padding: 0 1rem 1rem 0;
        gap: 2rem;
        align-items: stretch;
    }

    .parent-ubah-gambar .item {
        width: 50%;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
    }

    .parent-ubah-gambar .item img {
        border-radius: 5px;
        width: 100%;
        max-height: 25vmax;
        object-fit: cover;
    }

    .action-ubah {
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    .action-ubah input {
        position: absolute;
        inset: 0;

        opacity: 0;
    }
</style>
@endsection

@section('script')

<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    const pilihGambarUtama = document.querySelectorAll('input.pilih-gambar-utama')
    const labelGambarUtama = document.querySelectorAll('label.label-radio-gambar-utama')


    const inputNamaGambarUtama = document.querySelector('input#gambar_utama');

    ClassicEditor
        .create(document.querySelector('#deskripsi'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

    const previewGambar = (event, targetPreview, targetNamePreview, checkIsSelected) => {
        const [file] = event.target.files;
        const previewTarget = document.querySelector(targetPreview);
        const nameTarget = document.querySelector(targetNamePreview);
        const isChecked = document.querySelector(`input#${checkIsSelected}`);
        if (file) {
            previewTarget.src = URL.createObjectURL(file)
            nameTarget.value = file.name;

            if (isChecked.checked) {
                inputNamaGambarUtama.value = file.name
            }
        }
    }
    const selectedImage = (target, targetFor) => {
        labelGambarUtama.forEach(e => e.textContent = 'Pilih sbg Gambar Utama');
        const namaFile = document.querySelector(target).value;
        const label = document.querySelector(`label[for="${targetFor}"]`)
        label.textContent = 'Terpilih sbg Gambar Utama';
        inputNamaGambarUtama.value = namaFile
    }
    const removeItem = (number, target) => {
        const isChecked = document.querySelector(`input#${target}`).checked;
        if (isChecked) {
            return window.alert('Maaf, Gambar Utama tidak dapat di hapus. Silahkan pilih Gambar Utama lainnya terlebih dahulu jika ingin menghapus gambar ini.')
        }
        const item = document.querySelector(`.item[data-item="${number}"]`)
        item.remove()
    }

    const designLayout = (number) => {
        return `     <div class="item" data-item="${number}">
                    <input type="hidden" name="gambar[]" class="nama-gambar-${number}" value="{{$gambar}}">

                    <img class="gambar-produk preview-gambar-${number}" src="" alt="gambar produk">

                    <div class="action-ubah-gambar py-2">


                        <div class="form-check mb-2">
                            <input onchange="selectedImage('.nama-gambar-${number}','radio-${number}')" name="radio-gambar-utama" class=" form-check-input pilih-gambar-utama" type="radio" id="radio-${number}" {{$gambar == $product->gambar_utama ? 'checked' : ''}}>
                            <label class="form-check-label text-truncate w-100 label-radio-gambar-utama" for="radio-${number}">
                                {{$gambar == $product->gambar_utama ? 'Terpilih sbg Gambar Utama' : 'Pilih sbg Gambar Utama'}}
                            </label>
                        </div>


                        <div class="row">
                            <div class="col-6 action-ubah">
                                <button type="button" class="btn btn-warning btn-sm d-block w-100">
                                    Ubah
                                </button>
                                <input type="file" name="gambar_pengganti[]" onchange="previewGambar(event,'img.preview-gambar-${number}','input.nama-gambar-${number}','radio-${number}')">
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-outline-danger btn-sm d-block w-100" onclick="removeItem('${number}','radio-${number}')">
                                    Hapus
                                </button>
                            </div>
                        </div>


                    </div>
                </div>`;
    }


    let nilaiAwal = null
    const tambahGambar = (current) => {

        let count = JSON.parse(current).length;
        if (nilaiAwal) {
            count = nilaiAwal;
        }
        nilaiAwal = count;
        nilaiAwal++;
        $('.parent-ubah-gambar').prepend(designLayout(nilaiAwal))
    }
</script>

@endsection