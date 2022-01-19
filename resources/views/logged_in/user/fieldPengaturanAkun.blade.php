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

<form enctype="multipart/form-data" style="margin-top: 5rem;" action="{{route('user.setting.field',[auth()->user()->email,$field])}}" method="post" onsubmit="toggleLoadingAction()">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $e)
            <li>{{$e}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @csrf
    @if($field == 'avatar')
    <div class="row justify-content-center gy-4 mb-4">
        <div class="col-md-6 col-8">
            <img src="{{avatar($user[$field],'/images/user/')}}" alt="" class="img-fluid img-thumbnail img-preview">
        </div>
        <div class="col-12">
            <div>
                <label for="formFile" class="form-label">Pilih File</label>
                <input class="form-control" name="avatar" type="file" id="inputFile">
            </div>
        </div>
    </div>

    @elseif($field == 'gender')

    <div class="form-floating mb-4">
        <select class="form-select" name="gender" id="floatingSelect" aria-label="Floating label select example">
            <option selected disabled>Pilih Salah Satu</option>
            <option value="L" {{$user[$field] == 'L' ? 'selected':''}}>Laki-Laki</option>
            <option value="P" {{$user[$field] == 'P' ? 'selected':''}}>Perempuan</option>

        </select>
        <label for="floatingSelect">Jenis Kelamin</label>
    </div>
    @elseif($field == 'change_password')
    <div class="form-floating mb-4">

        <input class="form-control input-password @error($field) is-invalid @enderror " type="password" name="password" placeholder="Silahkan desain dan isi profil perusahaan anda disini." id="password_baru" />

        <label for="password_baru">Password Baru</label>

    </div>
    <div class="form-floating mb-4">

        <input value="{{$user[$field]}}" type="password" class="form-control input-password @error($field) is-invalid @enderror " name="password_confirmation" placeholder="Silahkan desain dan isi profil perusahaan anda disini." id="konfirmasi_password" />


        <label for="konfirmasi_password">Konfirmasi Password</label>

    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="show_password">
        <label class="form-check-label" for="show_password">
            Tampilkan Password
        </label>
    </div>
    @else
    <div class="form-floating mb-4">

        <input value="{{$user[$field]}}" type="text" class="form-control @error($field) is-invalid @enderror " name="{{$field}}" placeholder="Silahkan desain dan isi profil perusahaan anda disini." id="label" />


        <label for="label">{{ $title}}</label>

    </div>
    @endif
    <div class="d-flex justify-content-end">
        <a href="{{route('user.setting',auth()->user()->email)}}" class="btn btn-danger me-2" type="button">Batal</a>
        <button class="btn btn-success" type="submit">Simpan</button>
    </div>
</form>
@endsection

<!-- end Kontent Home -->

@section('script')
<script>
    const inputFile = document.querySelector('input#inputFile');
    if (inputFile) {
        const preview = document.querySelector('img.img-preview');
        inputFile.addEventListener('change', function(e) {
            const [file] = e.target.files;
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        })
    }

    const show_password = document.getElementById('show_password');

    if (show_password) {
        const labelPassword = document.querySelector('label[for="show_password"]');

        const inputPasswords = document.querySelectorAll('input.input-password')
        show_password.addEventListener('change', function(e) {
            const isChecked = e.target.checked;
            inputPasswords.forEach(ip => {
                if (isChecked) {
                    ip.setAttribute('type', 'text')
                    labelPassword.textContent = 'Sembuyikan Password'
                } else {
                    ip.setAttribute('type', 'password')
                    labelPassword.textContent = 'Tampilkan Password'

                }
            })
        })
    }
</script>
@endsection