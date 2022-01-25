@extends('layouts.main')
@section('title','List Produk dari Kategori '.$kategori->nama)




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
                            <input type="text" class="form-control ps-5 trigger-modal-search with-placeholder" placeholder="{{$kategori->nama}}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="konten-kolom" style="margin-top: 6rem;">
        @foreach($kategori->products as $psc)
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
        @endforeach
    </div>
    <div class="my-4 text-center fw-bold">
        Tidak ada Produk lainnya
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
        width: 100%;
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
        toggleLoadingLogo();
        window.location.href = href;
    }
</script>

@endsection