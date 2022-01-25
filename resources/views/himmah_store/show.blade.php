@extends('layouts.main')
@section('title',$product->nama)


@section('content_carousel_image')
<div class="container px-0 overflow-hidden">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="owl-carousel owl-theme " id="carousel-image">
                @foreach(json_decode($product->gambar) as $gambar)
                @if($loop->iteration == 1)
                <div class="item w-100 active">
                    <img src="{{avatar($gambar,'/images/store/produk/')}}" class="d-block w-100 img-carousel" alt="...">
                    <div class="current-item">
                        {{$loop->iteration}}/{{count(json_decode($product->gambar))}}
                    </div>
                </div>
                @else
                <div class="item w-100">
                    <img src="{{avatar($gambar,'/images/store/produk/')}}" class="d-block w-100 img-carousel" alt="...">
                    <div class="current-item">
                        {{$loop->iteration}}/{{count(json_decode($product->gambar))}}
                    </div>
                </div>
                @endif
                @endforeach
            </div>

        </div>
    </div>
</div>


@endsection

@section('action_menu_show_produk')
<div class="fixed-bottom bg-white action-produk shadow-lg">
    <div class="container px-0">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row text-center text-success">
                    <div class="col-6 parent-icon py-2">
                        @if(Auth::check())
                        <i onclick="chatWhatsapp('{{$product->store->no_telepon}}','Permisi, Saya *{{auth()->user()->name}}* mau bertanya mengenai produk *{{$product->nama}}*')" class="bi bi-chat-dots cursor-pointer  fs-3"></i>
                        <div class="border-start border-2 py-2">&nbsp</div>
                        <i onclick="chatWhatsapp('{{$product->store->no_telepon}}','Permisi, Saya *{{auth()->user()->name}}* mau menghubungi Anda sebelum membeli produk *{{$product->nama}}*')" class="bi bi-whatsapp cursor-pointer  fs-3"></i>

                        @else

                        <i onclick="chatWhatsapp('{{$product->store->no_telepon}}','Permisi, Saya mau bertanya mengenai produk *{{$product->nama}}*')" class="bi bi-chat-dots cursor-pointer  fs-3"></i>
                        <div class="border-start border-2 py-2">&nbsp</div>
                        <i onclick="chatWhatsapp('{{$product->store->no_telepon}}','Permisi, Saya mau menghubungi Anda sebelum membeli produk *{{$product->nama}}*')" class="bi bi-whatsapp cursor-pointer  fs-3"></i>

                        @endif
                    </div>
                    <div class="col-6 bg-success  text-light justify-content-center d-flex align-items-center">
                        @if(Auth::check())
                        <small class="d-block cursor-pointer w-100" onclick="chatWhatsapp('{{$product->store->no_telepon}}','Permisi, Saya *{{auth()->user()->name}}* berminat untuk membeli produk *{{$product->nama}}* %0aLink Produk {{request()->url()}}')">Beli Sekarang</small>

                        @else
                        <a class="text-decoration-none d-block w-100 text-light" href="{{route('login')}}">Beli Sekarang</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('content')
<div>
    <!-- section header top -->
    <div class="fixed-top header-product ">
        <div class="container px-2">

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class=" header-show-product text-center">
                        <i data-current-page="{{route('store.index')}}" class="bi bi-arrow-left-short icon-back"></i>
                        <div class="field-search hidden">
                            <i class="bi bi-search"></i>
                            <input type="text" class="form-control ps-5 trigger-modal-search with-placeholder" placeholder="Cari Sesuatu di {{$product->store->nama}}">
                        </div>
                        <div class="d-flex align-items-center ms-4">
                            <i class="bi bi-box-arrow-up-right fs-2 me-2 cursor-pointer"></i>
                            <!-- <i class="bi bi-cart fs-2 cursor-pointer me-2"></i> -->
                            <i class="bi bi-three-dots-vertical fs-2  cursor-pointer"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end section header top -->
    <div class="my-1">

        <div class="fs-4 mt-2">
            {{$product->nama}}
        </div>
        <div class="mt-2">
            <div class="fs-1 text-success">
                <span class="fs-4">Rp</span>{{formatIDR($product->harga)}}
            </div>
        </div>
    </div>


    <div class="space-y bg-light my-2"></div>
    <div class="my-1">
        <div class="row g-1 align-items-center ">

            <div class="col-8 ">

                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-2  col-3 text-center">
                        <img src="{{avatar($product->store->avatar,'/images/store/logo/')}}" alt="" class="rounded-circle me-2 gambar-toko ">
                    </div>
                    <div class="col-sm-10 col-9  ">
                        <small class="fw-bold d-block text-truncate">{{$product->store->nama}}</small>
                        <small class="d-block text-truncate"><i class="bi bi-geo-alt me-1"></i>{{$product->store->kota}}, {{$product->store->provinsi}}</small>
                    </div>
                </div>
                <!-- Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi numquam ducimus doloribus aliquid. Nemo, eveniet explicabo laborum natus quibusdam, quae, voluptate sit rem esse quisquam omnis aliquam dolore recusandae. Quae, fugit aliquid eius labore facilis optio at, eum consequuntur libero illum omnis eveniet fuga quisquam praesentium a ipsum. Dolore delectus optio magnam obcaecati, commodi debitis, corrupti tenetur quisquam accusantium aut accusamus neque voluptatem quidem aspernatur necessitatibus fugiat id, rerum provident quia atque assumenda odio! Excepturi, reprehenderit corporis dolores et tempore possimus accusantium, rerum magni minima odit quaerat ipsum saepe eos nisi ad vel nesciunt debitis consectetur facere molestias placeat ducimus. -->

                <!-- 
                   
                    <div class="info d-flex flex-column">
                     
                    </div> -->

            </div>
            <div class="col-4  text-center">
                <a href="{{route('store.show',$product->store->slug)}}" class="btn  btn-sm btn-outline-success"><small>Kunjungi Toko</small></a>
            </div>

        </div>
        <div class="mt-2 ">
            <small><b class="text-success">{{$product->store->products->count()}}</b> Produk</small>
        </div>
    </div>
    <div class="space-y bg-light my-2"></div>

    @if($produk_lainnya->count()> 0)
    <div class="my-1">
        <small class="fw-bold my-2 d-block">Produk Toko lainnya</small>
        <div class="produk-toko-lainnya">
            @foreach($produk_lainnya as $pl)
            <a href="{{route('detail_produk',[$product->store->slug,$pl->slug])}}" class="konten-card">

                <div class="card">
                    <img src="{{avatar($pl->gambar_utama,'/images/store/produk/')}}" alt="">
                    <div class="p-2 text">
                        <div class="mb-2 lh-sm nama-produk">{{$pl->nama}}</div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="text-success">
                                <small class="font-extra-small">Rp</small><span>{{formatIDR($pl->harga)}}</span>
                            </div>
                            <!-- <small class="font-extra-small">10 Terjual</small> -->
                        </div>
                    </div>
                </div>
            </a>

            @endforeach
        </div>
    </div>
    <div class="space-y bg-light my-2"></div>

    @endif
    <div class="my-1">
        <small class="fw-bold my-2 d-block ">Rincian Produk</small>
        <div class="card border-start-0 py-3 border-bottom-0 border-end-0 rounded-0">
            {!! $product->deskripsi !!}
        </div>
    </div>
    <div class="space-y bg-light my-2"></div>
    <div class="my-1">
        <small class="fw-bold my-4 d-block text-center ">&mdash; Kamu Mungkin Juga Suka &mdash;</small>
        <div class="{{$product_same_category->count() > 0 ? 'konten-kolom' : ''}}">
            @forelse($product_same_category as $psc)
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
                Data Produk dari Toko lainnya masih belum tersedia
            </div>
            @endforelse
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
                        <div class="modal-body border-0">
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
</script>

@endsection