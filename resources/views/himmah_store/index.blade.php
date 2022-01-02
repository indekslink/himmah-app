@extends('layouts.main')
@section('title','Himmah Store')
@include('partials.menubottom')
@section('content')
<div>
    <!-- section header top -->
    <div class="d-flex align-items-center py-2 bg-white flex-wrap nav-header sticky-top justify-content-between">
        <div class="d-flex align-items-center logo-place">
            <img src="{{asset('/images/LOGO-HIMMAH-STORE.png')}}" alt="logo himmah">

            <div class="text-center">
                <div class="fs-3 fw-bold font-logo lh-1">HIMMAH</div>
                <div class="fs-5 font-logo">STORE</div>
            </div>
        </div>
        <div class="d-flex align-items-center">

            <i class="bi bi-cart fs-1 cursor-pointer"></i>

        </div>

        <div class="w-100 mt-2">
            <div class="field-search">
                <i class="bi bi-search"></i>
                <input type="text" class="form-control ps-5" id="inputFieldSearch" placeholder="Cari Sesuatu ...">
            </div>
        </div>
    </div>
    <!-- end section header top -->

    <div class="item mt-4">
        <div class="header-item mb-4">
            <div class="fs-5 text-uppercase text-success">kategori</div>
            <a href="" class="text-decoration-none text-muted ">Lihat Semua <i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="konten">


            <div class="kategori">
                @foreach($categories['top'] as $c)
                <div class="item mb-4  ">
                    <div class="parent-img bg-light">
                        <img src="{{avatar($c->gambar,'/images/store/kategori/')}}" alt="">
                    </div>
                    <span class="mt-4">{{$c->nama}}</span>
                </div>
                @endforeach
            </div>
            <div class="kategori">
                @foreach($categories['bottom'] as $c)
                <div class="item  ">
                    <div class="parent-img bg-light">
                        <img src="{{avatar($c->gambar,'/images/store/kategori/')}}" alt="">
                    </div>
                    <span class="mt-4">{{$c->nama}}</span>
                </div>
                @endforeach
            </div>




        </div>
    </div>

    <div class="space-y bg-light mt-4"></div>

    <div class="item mt-4 rekomendasi">
        <div class="header-item mb-4">
            <div class="fs-5 text-uppercase text-success">PRODUK TERKINI</div>
            <a href="" class="text-decoration-none text-muted ">Lihat Semua <i class="bi bi-chevron-right"></i></a>
        </div>

        <div class="konten-column">
            <a href="" class="konten-card">
                <div class="card">
                    <img src="{{asset('/images/store/al-quran.jfif')}}" alt="">
                    <div class="p-2 text">
                        <div class="mb-2 lh-sm nama-produk">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo neque dolorem repudiandae iste! Dolorum molestiae tempora in numquam suscipit. Dolore.</div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-success">
                                <small class="font-extra-small">Rp</small><span>49.987</span>
                            </div>
                            <small class="font-extra-small">10 Terjual</small>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="konten-card">
                <div class="card">
                    <img src="{{asset('/images/store/kalung.jpeg')}}" alt="">
                    <div class="p-2 text">
                        <div class="mb-2 lh-sm nama-produk">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo neque dolorem repudiandae iste! Dolorum molestiae tempora in numquam suscipit. Dolore.</div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-success">
                                <small class="font-extra-small">Rp</small><span>49.987</span>
                            </div>
                            <small class="font-extra-small">10 Terjual</small>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="konten-card">
                <div class="card">
                    <img src="{{asset('/images/store/sajadah.jpg')}}" alt="">
                    <div class="p-2 text">
                        <div class="mb-2 lh-sm nama-produk">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo neque dolorem repudiandae iste! Dolorum molestiae tempora in numquam suscipit. Dolore.</div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-success">
                                <small class="font-extra-small">Rp</small><span>49.987</span>
                            </div>
                            <small class="font-extra-small">10 Terjual</small>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="konten-card">
                <div class="card">
                    <img src="{{asset('/images/store/tasbih.jfif')}}" alt="">
                    <div class="p-2 text">
                        <div class="mb-2 lh-sm nama-produk">Syurban</div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-success">
                                <small class="font-extra-small">Rp</small><span>49.987</span>
                            </div>
                            <small class="font-extra-small">10 Terjual</small>
                        </div>
                    </div>
                </div>
            </a>
            <a href="" class="konten-card">
                <div class="card">
                    <img src="{{asset('/images/store/syurban.jfif')}}" alt="">
                    <div class="p-2 text">
                        <div class="mb-2 lh-sm nama-produk">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo neque dolorem repudiandae iste! Dolorum molestiae tempora in numquam suscipit. Dolore.</div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-success">
                                <small class="font-extra-small">Rp</small><span>49.987</span>
                            </div>
                            <small class="font-extra-small">10 Terjual</small>
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('/vendor/clamp/clamp.js')}}"></script>
<script>
    let namaProduk = document.querySelectorAll('.nama-produk');
    namaProduk.forEach(e => $clamp(e, {
        clamp: 2
    }))
</script>
@endsection


@section('style')
<style>
    .nav-header img {
        width: calc(2vw + 60px);
        height: calc(2vw + 60px);
        margin-right: .5rem;
    }



    .item .header-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .item .header-item a {
        font-size: 14px;
    }

    .field-search {
        position: relative;
    }

    .field-search i {
        position: absolute;
        left: 1.1rem;
        top: 50%;
        opacity: .6;
        transform: translateY(-50%);
    }

    .konten {
        display: flex;

        overflow-y: auto;
        flex-direction: column;
        scroll-behavior: smooth;
    }

    .item.item.rekomendasi .konten {
        margin: 0 -12px;
        padding: 12px;
    }

    .konten::-webkit-scrollbar {
        display: none !important;
    }

    .item .font-extra-small {
        font-size: 12px;
    }

    /* .item.rekomendasi i {
        font-size: 2rem;
    } */

    /* Hide scrollbar for IE, Edge and Firefox */
    .konten {
        -ms-overflow-style: none !important;
        /* IE and Edge */
        scrollbar-width: none !important;
        /* Firefox */
    }

    .konten .kategori {
        display: flex;
        gap: 3rem;
        align-items: center;
    }

    .konten .item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .konten .parent-img {
        position: relative;
        border-radius: 50%;
        width: 100px;
        height: 100px;

    }

    .konten .parent-img img {
        width: 100%;
        height: 100%;

    }

    .konten-column {
        columns: 2;
        column-gap: 1rem;
    }

    .konten-column a.konten-card {
        margin-bottom: 1rem;
        width: 100%;
    }

    a.konten-card {
        display: inline-block;
        text-decoration: none;
        color: black;
    }

    a.konten-card .text {
        height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    a.konten-card img {
        width: 100%;
        max-height: 50vmin;
        object-fit: cover;
    }
</style>
@endsection