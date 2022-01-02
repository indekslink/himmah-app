@extends('layouts.main')
@section('title','Pengaturan Akun')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('user.index',emailLogin())}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Pengaturan Akun</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card menu mb-5" style="margin-top: 5rem;">
    <div class="card-header fs-5 sticky-top bg-light">Harus Diisi</div>
    <div class="card-body bg-light p-0">
        <a href="{{route('user.setting.field',[$user->email,'name'])}}" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">

                <div class=" lh-sm ms-2">Nama</div>

                <span class="info-update">
                    {{$user->name}}
                </span>
            </div>
        </a>
        <a href="{{route('user.setting.field',[$user->email,'email'])}}" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">

                <div class=" lh-sm ms-2">Email</div>

                <div class="info-update">
                    <div> {{$user->email}}</div>

                </div>
            </div>
        </a>
        <a href="{{route('user.setting.field',[$user->email,'change_password'])}}" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">

                <div class=" lh-sm ms-2">Ubah Password</div>
                <i class="bi bi-chevron-right fs-5"></i>
            </div>
        </a>

    </div>
</div>
<div class="card menu my-5">
    <div class="card-header fs-5 sticky-top bg-light">Opsional</div>
    <div class="card-body bg-light p-0">
        <a href="{{route('user.setting.field',[$user->email,'address'])}}" class="item p-2 bg-white">
            <div class="top ">
                <div class="row">
                    <div class="col-6">
                        <div class=" lh-sm ms-2">Alamat</div>
                    </div>
                    <div class="col-6">
                        @if($user->address)
                        <span class="info-update">
                            {{$user->address}}
                        </span>
                        @else
                        <i class="bi bi-chevron-right fs-5"></i>
                        @endif
                    </div>
                </div>



            </div>
        </a>
        <a href="{{route('user.setting.field',[$user->email,'gender'])}}" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">

                <div class=" lh-sm ms-2">Jenis Kelamin</div>

                @if($user->gender)
                <span class="info-update">
                    {{$user->gender == 'L' ? 'Laki-Laki' : 'Perempuan'}}
                </span>
                @else
                <i class="bi bi-chevron-right fs-5"></i>
                @endif
            </div>
        </a>
        <a href="{{route('user.setting.field',[$user->email,'avatar'])}}" class="item p-2 bg-white">
            <div class="top d-flex  align-items-center justify-content-between">

                <div class=" lh-sm ms-2">Avatar</div>

                @if($user->avatar)
                <span class="info-update">
                    <img class="img-fluid" style="width: 50px;height:50px;" src="{{avatar($user->avatar)}}" alt="">
                </span>
                @else
                <i class="bi bi-chevron-right fs-5"></i>
                @endif
            </div>
        </a>


    </div>
</div>
@endsection
<!-- end Kontent Home -->