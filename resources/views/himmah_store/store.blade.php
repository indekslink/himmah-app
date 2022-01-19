@extends('layouts.main')
@section('title',$store->nama)


@section('content_carousel_image')
<div style="margin-top: 6rem;" class="container px-0 overflow-hidden">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="row align-items-center  px-2">
                <div class="col-9">
                    <div class="d-flex align-items-center flex-wrap">
                        <img style="width: 60px;height:60px;object-fit:contain;" src="{{avatar($store->avatar,'/images/store/logo/')}}" alt="" class="rounded-circle  me-2 img-fluid">
                        <div>

                            <div class="fw-bold mb-2"><a href="#" class="text-decoration-none text-dark  d-flex align-items-center">{{$store->nama}} <i class="bi bi-chevron-right ms-2"></i></a></div>
                            <small class="d-flex align-items-center"><i class="bi bi-geo-alt me-1"></i>{{$store->kota}}, {{$store->provinsi}}</small>
                        </div>
                    </div>
                </div>
                <div class="col-3 text-center d-flex flex-column align-items-end">
                    <button onclick="chatWhatsapp('{{$store->no_telepon}}','Halo *Toko {{$store->nama}}*, Apakah Saya boleh berbicara dengan pemilik toko ini ?')" class="btn btn-sm btn-success mb-2 w-100"><i class="bi bi-telephone-fill me-1"></i> Hubungi</button>
                    <button onclick="chatWhatsapp('{{$store->no_telepon}}','Halo *Toko {{$store->nama}}*, Apakah Saya boleh mengajukan pertanyaan kepada pemilik toko ini ?')" class="btn btn-sm btn-outline-success w-100"><i class="bi bi-chat-dots me-1"></i> Chat</button>
                </div>
            </div>

            <ul class="nav nav-pills my-3 justify-content-between nav-fill flex-nowrap" id="nav" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-produk-tab" data-bs-toggle="pill" data-bs-target="#tab-produk" type="button" role="tab" aria-controls="tab-produk" aria-selected="true">Produk</button>
                </li>


                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-kategori-tab" data-bs-toggle="pill" data-bs-target="#tab-kategori" type="button" role="tab" aria-controls="tab-kategori" aria-selected="false">Kategori</button>
                </li>
            </ul>
            <div class="tab-content px-2" id="navContent">
                <div class="tab-pane fade show active" id="tab-produk" role="tabpanel" aria-labelledby="tab-produk-tab">
                    <div class="my-1">
                        <ul class="nav nav-pills tab-produk nav-fill mb-3" id="pills-tab-produk" role="tablist">
                            <li onclick="filterAction(`{{route('store.show',[$store->slug])}}`)" class="nav-item" role="presentation">
                                <button class="nav-link {{!request()->has('filter') ? 'active' : ''}}" id="pills-semua-tab" data-bs-toggle="pill" data-bs-target="#pills-semua" type="button" role="tab" aria-controls="pills-semua" aria-selected="true">Semua</button>
                            </li>
                            <li onclick="filterAction(`{{route('store.show',[$store->slug, 'filter' => 'desc'])}}`)" class="nav-item" role="presentation">
                                <button class="nav-link {{request()->has('filter') && request()->get('filter') == 'desc' ? 'active' : ''}}" id="pills-terbaru-tab" data-bs-toggle="pill" data-bs-target="#pills-terbaru" type="button" role="tab" aria-controls="pills-terbaru" aria-selected="false">Terbaru</button>
                            </li>
                            <li onclick="filterAction(`{{route('store.show',[$store->slug, 'filter' => 'asc'])}}`)" class="nav-item" role="presentation">
                                <button class="nav-link  {{request()->has('filter') && request()->get('filter') == 'asc' ? 'active' : ''}}" id="pills-terlama-tab" data-bs-toggle="pill" data-bs-target="#pills-terlama" type="button" role="tab" aria-controls="pills-terlama" aria-selected="false">Terlama</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tab-produkContent">
                            <div class="tab-pane fade show active" id="pills-semua" role="tabpanel" aria-labelledby="pills-semua-tab">
                                <div class="{{$store->products->count() > 0 ? 'konten-kolom' : ''}}">
                                    @forelse($store->products as $psc)
                                    <a href="{{route('detail_produk',[$psc->store->slug,$psc->slug])}}" class="konten-card">
                                        <div class="card">
                                            <img src="{{avatar($psc->gambar_utama,'/images/store/produk/')}}" alt="">
                                            <div class="p-2 text">
                                                <div class="mb-2 lh-sm nama-produk">{{$psc->nama}}</div>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="text-success">
                                                        <small class="font-extra-small">Rp</small><span>{{formatIDR($psc->harga)}}</span>
                                                    </div>
                                                    <!-- <small class="font-extra-small">10 Terjual</small> -->
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    @empty

                                    <div class="text-center">
                                        Data Produk dari Toko {{$store->nama}} masih belum tersedia
                                    </div>
                                    @endforelse
                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-terbaru" role="tabpanel" aria-labelledby="pills-terbaru-tab">...</div>
                            <div class="tab-pane fade" id="pills-terlama" role="tabpanel" aria-labelledby="pills-terlama-tab">...</div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="tab-kategori" role="tabpanel" aria-labelledby="tab-kategori-tab">...</div>
            </div>
        </div>
    </div>



</div>


@endsection



@section('content')
<div>
    <!-- section header top -->
    <div class="fixed-top header-product bg-white shadow-sm">
        <div class="container px-2">

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class=" header-show-product text-center">
                        <i data-current-page="{{route('store.index')}}" class="bi bi-arrow-left-short icon-back"></i>
                        <div class="field-search without-hidden">
                            <i class="bi bi-search"></i>
                            <input type="text" class="form-control ps-5 trigger-modal-search with-placeholder" placeholder="Cari di {{$store->nama}}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="modalPencarian" aria-labelledby="modalPencarianLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-light">
            <div class="container px-2">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="modal-header border-0">
                            <div class="field-search w-100">
                                <i class="bi bi-search"></i>
                                <input type="text" class="form-control ps-5" id="inputFieldSearch" placeholder="Cari Sesuatu ...">
                            </div>
                        </div>
                        <div class="modal-.nav-pills border-0">
                            ...
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Tutup Pencarian</button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection


@section('style')
<link rel="stylesheet" href="{{asset('/vendor/owl-carousel/dist/assets/owl.carousel.min.css')}}" />
<link rel="stylesheet" href="{{asset('/vendor/owl-carousel/dist/assets/owl.theme.green.min.css')}}" />
<style>
    a.konten-card {
        margin-bottom: 1rem;

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

    .header-product {
        transition: background .5s ease-in-out;
    }

    .action-produk .parent-icon {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }

    /* #carousel-image {
        margin: 0 -12px;
    } */
    .produk-toko-lainnya {
        display: flex;
        gap: 1rem;
        overflow: auto hidden;
    }

    .produk-toko-lainnya a {
        min-width: 200px;
        max-width: 50%;
    }

    .produk-toko-lainnya a img {
        max-height: 45vmin;
    }

    .gambar-toko {
        width: 60px;
        height: 60px;
    }

    #carousel-image .img-carousel {
        height: 50vh;
        object-fit: contain;
    }

    #carousel-image .item {
        position: relative;
    }

    #carousel-image .item .current-item {
        position: absolute;
        right: 12px;
        bottom: 5px;
        background-color: whitesmoke;
        padding: 2px 15px;
        border-radius: 50px;
        border: 1px solid lightgray;
    }

    .field-search {
        position: relative;
        width: 100%;
        transition: .5s ease-in-out;
        opacity: 1;
        z-index: 9999;
    }

    .field-search.hidden {
        opacity: 0;
        z-index: -9999;
    }

    .header-show-product {
        display: flex;
        align-items: center;
        justify-content: space-between;

    }

    .header-show-product i.icon-back {
        position: relative !important;
        transform: translate(0, 0);
    }

    .field-search i {
        position: absolute;
        left: 1.1rem;
        top: 50%;
        opacity: .6;
        transform: translateY(-50%);
    }

    .konten-kolom {
        columns: 2;
        column-gap: 1rem;
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
        object-fit: contain;
    }

    .nav-pills::-webkit-scrollbar {
        display: none !important;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .nav-pills {
        -ms-overflow-style: none !important;
        /* IE and Edge */
        scrollbar-width: none !important;
        /* Firefox */
        overflow: auto hidden;
    }


    .nav-pills.tab-produk .nav-item:not(:last-child) {
        border-right: 1px solid #eee;
    }



    .nav-pills .nav-link {
        border-radius: 0;
        color: black;
        font-size: 14px;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #198754;
        background-color: transparent;
        border-bottom: 2px solid #198754;
    }

    .nav-pills.tab-produk .nav-link.active,
    .nav-pills.tab-produk .show>.nav-link {
        color: #198754;
        background-color: transparent;

        border-bottom: 0;
    }
</style>
@endsection

@section('script')
<script src="{{asset('/vendor/owl-carousel/dist/owl.carousel.min.js')}}"></script>
<script src="{{asset('/vendor/clamp/clamp.js')}}"></script>
<script>
    let owl = $('.owl-carousel#carousel-image');

    owl.owlCarousel({
        items: 1,
        dots: false,
        smartSpeed: 500,
        responsive: {
            0: {
                items: 1
            }
        }
    })

    let namaProduk = document.querySelectorAll('.nama-produk');
    namaProduk.forEach(e => $clamp(e, {
        clamp: 2
    }))

    function chatWhatsapp(noTelepon, text) {
        if (noTelepon[0] === '0') {
            noTelepon = noTelepon.replace('0', '62')
        }
        text = text.split(' ').join('%20');

        window.open(`https://api.whatsapp.com/send?phone=${noTelepon}&text=${text}`, '_blank')
    }

    function filterAction(href) {
        window.location.href = href;
    }
</script>

@endsection