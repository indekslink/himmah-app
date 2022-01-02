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

<form style="margin-top: 5rem;" action="{{route('manage.company.profile.field.store',$lowerTitle)}}" method="post">
    @csrf
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
    <div class="d-flex justify-content-end">
        <a href="{{route('manage.company.profile')}}" class="btn btn-danger me-2" type="button">Batal</a>
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</form>
@endsection

<!-- end Kontent Home -->


@if($lowerTitle == 'custom')
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
@endif