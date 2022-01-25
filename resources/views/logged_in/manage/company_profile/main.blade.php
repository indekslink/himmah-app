@extends('layouts.main')
@section('title','Kelola Profile Perusahaan')

@section('content')
<div class="fixed-top bg-white">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class=" py-2 position-relative  text-center">
                    <i data-current-page="{{route('user.index',emailLogin())}}" class="bi bi-arrow-left-short icon-back"></i>
                    <div class="fs-4 fw-bold">Kelola Profil Perusahaan</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-floating  mb-5" style="margin-top: 5rem;">

    <select {{$count == 0 ?'disabled' : ''}} class="form-select form-select-lg" id="pilih_desain" aria-label="Default select example">
        <option {{$data ? '' : 'selected'}} disabled>Pilih Desain</option>
        <option {{$default_design ? '' : 'disabled'}} {{$data && $data->default_design == '1' ? 'selected' : ''}} value="1">Default Desain</option>
        <option {{$custom_design ? '' : 'disabled'}} {{$data && $data->default_design == '0' ? 'selected' : ''}} value="0">Custom Desain</option>
    </select>
    <label for="floatingSelect">Desain Aktif</label>
    @if($count == 0)
    <small class="text-danger d-block">*Silahkan isi Profil Perusahaan anda terlebih dahulu pada input dibawah ini</small>

    @elseif($data==null)
    <small class="text-danger d-block">*Silahkan pilih desain yang akan diaktifkan.</small>
    @if(!$default_design)
    <small class="text-info d-block">*Jika ingin mengaktifkan Default Desain, Silahkan isi minimal salah satu field terlebih dahulu.</small>
    @elseif(!$custom_design)
    <small class="text-info d-block">*Jika ingin mengaktifkan Custom Desain, Silahkan buat Custom Desain terlebih dahulu.</small>
    @endif
    @endif
</div>

@if(session('success'))
<div class="alert alert-success mt-4 alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<ul class="nav nav-pills my-5 d-flex align-items-center justify-content-center" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link  {{$default_design && ($data && $data->default_design =='1') ? ' active' : ''}}" id="default-tab" data-bs-toggle="pill" data-bs-target="#default" type="button" role="tab" aria-controls="default" aria-selected="true">Default Desain</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{$custom_design && ($data && $data->default_design =='0') ? ' active' : ''}}" id="custom-tab" data-bs-toggle="pill" data-bs-target="#custom" type="button" role="tab" aria-controls="custom" aria-selected="false">Custom Desain</button>
    </li>

</ul>
<div class="tab-content" id="pills-tabContent">
    <!-- default design -->
    <div class="tab-pane fade {{$default_design && ($data && $data->default_design =='1') ? 'show active' : ''}} card menu my-5" id="default">
        <div class="card-header sticky-top  bg-light">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="fs-5">Default Desain</div>
                    <small class="text-success ">*Anda hanya bisa mengganti isi pada field menu yang tersedia</small>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center justify-content-end">

                        <small><i class="bi bi-check2 fs-4 me-2 text-success"></i></small>
                        <small>Sudah Terisi</small>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">

                        <small><i class="bi bi-x fs-4  me-2 text-danger"></i></small>
                        <small>Belum Terisi</small>
                    </div>
                </div>
            </div>


        </div>
        <div class="card-body bg-light p-0">
            <a href="{{route('manage.company.profile.field','judul')}}" class="item p-2 bg-white">
                <div class="top d-flex  align-items-center justify-content-between">

                    <div class=" lh-sm ms-2">
                        <span>Judul</span>
                        <sup>

                            @if($default_design && $default_design->judul)
                            <small><i class="bi bi-check2 fs-4   text-success"></i></small>
                            @else
                            <small><i class="bi bi-x fs-4   text-danger"></i></small>
                            @endif
                        </sup>
                    </div>
                    <i class="bi bi-chevron-right fs-4"></i>
                </div>
            </a>
            <a href="{{route('manage.company.profile.field','deskripsi')}}" class="item p-2 bg-white">
                <div class="top d-flex  align-items-center justify-content-between">

                    <div class=" lh-sm ms-2">
                        <span>Deskripsi</span>
                        <sup>

                            @if($default_design && $default_design->deskripsi)
                            <small><i class="bi bi-check2 fs-4   text-success"></i></small>
                            @else
                            <small><i class="bi bi-x fs-4   text-danger"></i></small>
                            @endif
                        </sup>
                    </div>
                    <i class="bi bi-chevron-right fs-4"></i>
                </div>
            </a>
            <a href="{{route('manage.company.profile.field','visi')}}" class="item p-2 bg-white">
                <div class="top d-flex  align-items-center justify-content-between">

                    <div class=" lh-sm ms-2">
                        <span>Visi</span>
                        <sup>

                            @if($default_design && $default_design->visi)
                            <small><i class="bi bi-check2 fs-4   text-success"></i></small>
                            @else
                            <small><i class="bi bi-x fs-4   text-danger"></i></small>
                            @endif
                        </sup>
                    </div>
                    <i class="bi bi-chevron-right fs-4"></i>
                </div>
            </a>
            <a href="{{route('manage.company.profile.field','misi')}}" class="item p-2 bg-white">
                <div class="top d-flex  align-items-center justify-content-between">

                    <div class=" lh-sm ms-2">
                        <span>Misi</span>
                        <sup>

                            @if($default_design && $default_design->misi)
                            <small><i class="bi bi-check2 fs-4   text-success"></i></small>
                            @else
                            <small><i class="bi bi-x fs-4   text-danger"></i></small>
                            @endif
                        </sup>
                    </div>
                    <i class="bi bi-chevron-right fs-4"></i>
                </div>
            </a>



        </div>
    </div>


    <!-- custom design -->
    <div class="tab-pane fade {{$custom_design && ($data && $data->default_design =='0') ? 'show active' : ''}} card menu my-5" id="custom">
        <div class=" card-header sticky-top bg-light">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="fs-5">Custom Desain</div>

                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center justify-content-end">

                        <small><i class="bi bi-check2 fs-4 me-2 text-success"></i></small>
                        <small>Sudah Terisi</small>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">

                        <small><i class="bi bi-x fs-4  me-2 text-danger"></i></small>
                        <small>Belum Terisi</small>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body bg-light p-0">
            <a href="{{route('manage.company.profile.field','custom')}}" class="item p-2 bg-white">
                <div class="top d-flex  align-items-center justify-content-between">

                    <div class=" lh-sm ms-2">
                        <span>Upload dokumen Anda</span>
                        <sup>

                            @if($custom_design)
                            <small><i class="bi bi-check2 fs-4   text-success"></i></small>
                            @else
                            <small><i class="bi bi-x fs-4   text-danger"></i></small>
                            @endif
                        </sup>
                    </div>
                    <i class="bi bi-chevron-right fs-4"></i>
                </div>
            </a>




        </div>
    </div>
</div>
@endsection
<!-- end Kontent Home -->

@section('style')
<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: white !important;
        background-color: #07971a !important;
    }

    .nav-link,
    .nav-link:focus,
    .nav-link:hover {
        color: #07971a !important;
    }
</style>
@endsection


@section('script')
<script>
    const urlSetDesign = `{{route("manage.company.profile.field.setdesign")}}`;
    const selectDesign = document.querySelector('#pilih_desain');
    const token = document.querySelector('meta[name="token"]').getAttribute('content')
    if (selectDesign) {
        selectDesign.addEventListener('change', function() {
            const value = this.value;
            toggleLoadingAction()
            fetch(urlSetDesign, {
                    method: 'post',
                    headers: {
                        'Accept': 'application/json, text/plain, */*',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        _token: token,
                        value
                    })
                }).then(res => res.json())
                .then(res => {
                    let {
                        status
                    } = res;
                    if (status == 'success') {
                        window.location.reload()
                    }
                    toggleLoadingAction()
                    toggleLoadingLogo()
                });
        })
    }
</script>
@endsection