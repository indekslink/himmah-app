@extends('layouts.main')
@section('title',$capitalizeTitle . ' Profil Perusahaan')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div data-current-page="{{route('manage.company.profile')}}" class=" py-2 position-relative  text-center">
                    <i class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold"> Isi {{$capitalizeTitle}}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<form style="margin-top: 5rem;" action="{{route('manage.company.profile.field.store',$lowerTitle)}}" method="post" enctype="multipart/form-data" onsubmit="toggleLoadingAction()">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="m-0">
            @foreach($errors->all() as $m)
            <li class="m-0">{{$m}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
    @if($capitalizeTitle == 'Custom')
    <button class="btn-outline-primary btn d-block w-100 " type="button" onclick="addItemPreview()">Tambah Item</button>
    @if($data && $data->deskripsi != "null")
    <div class="row gy-5 parent-preview mt-3" style="max-height:70vh;overflow:hidden auto;">
        @foreach(json_decode($data->deskripsi) as $g)
        <div class="col-12 item-preview-{{ $loop->iteration }} items">
            <div class="row">
                <div class="col-4">
                    <img src="{{avatar($g, '/images/company_profile/')}}" class="item-preview-{{ $loop->iteration }} img-fluid" alt="gambar">
                </div>
                <div class="col-8">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Dokumen</label>
                        <input name="gambar[]" onchange="previewImage(event,'img.item-preview-{{ $loop->iteration }}','input.target-take-name-{{ $loop->iteration }}','value')" class="form-control" type="file" id="formFile" accept=".jpg, .jpeg, .png">
                        <input type="hidden" class="target-take-name-{{ $loop->iteration }}" name="gambar_ori[]" value="{{$g}}">
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm d-block w-100" onclick="deleteItem('{{ $loop->iteration }}')">Hapus</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <input type="hidden" name="gambar_lama" value="{{$data->deskripsi}}">
    @else
    <div class="row gy-5 parent-preview mt-3" style="max-height:70vh;overflow:hidden auto;">
    </div>
    <input type="hidden" name="deskripsi" value="null">
    @endif


    <br><br>
    @else
    <div class="form-floating mb-4">
        <textarea class="form-control @error($lowerTitle) is-invalid @enderror " name="{{$lowerTitle}}" style="height: 50vmin;" placeholder="Silahkan desain dan isi profil perusahaan anda disini." id="editor">@if($data){{$data[$lowerTitle]}}@endif
        </textarea>
        <label for="editor">{{$capitalizeTitle == 'Custom' ? '' : $capitalizeTitle}}</label>
        @error($lowerTitle)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @endif
    <div class="d-flex justify-content-end mb-4 btn-action {{ ($capitalizeTitle == 'Custom' && !$data) || ($data &&$data->deskripsi == 'null') ? 'd-none' : ''}}">
        <a href="{{route('manage.company.profile')}}" class="btn btn-danger me-2" type="button">Batal</a>
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>

</form>
@endsection

<!-- end Kontent Home -->

@if($capitalizeTitle == 'Custom')

@section('script')
<script>
    function layoutItemPreview(number) {
        return `
        <div class="col-12 item-preview-${number} items">
            <div class="row">
                <div class="col-4">
                    <img src="" class="item-preview-${number} img-fluid" alt="gambar">
                </div>
                <div class="col-8">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Dokumen</label>
                        <input name="gambar[]" onchange="previewImage(event,'img.item-preview-${number}','input.target-take-name-${number}','value')"class="form-control" type="file" id="formFile" accept=".jpg, .jpeg, .png" required>
                        <input type="hidden" class="target-take-name-${number}" name="gambar_ori[]" >
                    </div>
                    <button type="button" class="btn btn-outline-danger btn-sm d-block w-100" onclick="deleteItem('${number}')">Hapus</button>
                </div>
            </div>
        </div>`
    }

    let number = `{{$data && $data->deskripsi != "null" ? count(json_decode($data->deskripsi)) + 1 : '1'}}`;

    function addItemPreview() {

        $('.parent-preview').prepend(layoutItemPreview(number));
        $('.btn-action').removeClass('d-none')
        number++

    }

    function deleteItem(number) {
        const item = document.querySelector(`.items.item-preview-${number}`)
        item.remove();
    }
</script>

@endsection
@endif