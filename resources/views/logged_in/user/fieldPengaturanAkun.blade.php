@extends('layouts.main')
@section('title',$title . ' Anda')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold"> Isi {{$title}} Anda</div>
                </div>
            </div>
        </div>
    </div>
</div>

<form style="margin-top: 5rem;" action="{{route('user.setting.field',[auth()->user()->email,$field])}}" method="post">
    @csrf
    <div class="form-floating mb-4">

        <input value="{{$user[$field]}}" class="form-control @error($field) is-invalid @enderror " name="{{$field}}" placeholder="Silahkan desain dan isi profil perusahaan anda disini." id="editor" />


        <label for="editor">{{$title == 'Custom' ? '' : $title}}</label>
        @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{route('user.setting',auth()->user()->email)}}" class="btn btn-danger me-2" type="button">Batal</a>
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</form>
@endsection

<!-- end Kontent Home -->