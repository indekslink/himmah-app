@extends('layouts.main')
@section('title','Beranda')


@include('partials.menubottom')


@section('content')
<div>
    <!-- section header top -->
    @include('partials.header.himmahGroup')
    <!-- end section header top -->


    <!-- section for status session -->
    @if (session('status'))
    <div class="alert alert-success mt-4 alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    <!-- end section -->


    <!-- section slide -->

    <div class="owl-carousel mt-4 owl-theme slide-home">
        <div class="item">

            <a data-src="{{asset('/new/badal haji.jpg')}}" data-fancybox="slideHome" class="d-block w-100 cursor-pointer h-100">
                <img src="/new/badal haji.jpg" loading="lazy" alt="slide-image">
            </a>
            <!-- <div class="text">
                <div class="fs-4 mb-2 fw-bold lh-sm ">Haji dan Umroh</div>
                <small class="lh-sm d-block">Mari segera Daftarkan diri anda untuk segera berhaji/umroh tahun depan</small>
            </div> -->
        </div>
        <div class="item">
            <a data-src="{{asset('/new/badal UMRAH.jpg')}}" data-fancybox="slideHome" class="d-block w-100 cursor-pointer h-100">
                <img src="/new/badal UMRAH.jpg" loading="lazy" alt="slide-image">
            </a>
        </div>
        <div class="item">
            <a data-src="{{asset('/new/brosur paket umroh MARET.jpg')}}" data-fancybox="slideHome" class="d-block w-100 cursor-pointer h-100">
                <img src="/new/brosur paket umroh MARET.jpg" loading="lazy" alt="slide-image">
            </a>
        </div>
        <div class="item">
            <a data-src="{{asset('/new/paket umroh 18 maret.jpg')}}" data-fancybox="slideHome" class="d-block w-100 cursor-pointer h-100">
                <img src="/new/paket umroh 18 maret.jpg" loading="lazy" alt="slide-image">
            </a>

        </div>
        <div class="item">
            <a data-src="{{asset('/new/stand banner himmah card.jpg')}}" data-fancybox="slideHome" class="d-block w-100 cursor-pointer h-100">
                <img src="/new/stand banner himmah card.jpg" loading="lazy" alt="slide-image">
            </a>

        </div>
        <div class="item">
            <a data-src="{{asset('/new/stand banner MANASIK.jpg')}}" data-fancybox="slideHome" class="d-block w-100 cursor-pointer h-100">
                <img src="/new/stand banner MANASIK.jpg" loading="lazy" alt="slide-image">
            </a>
        </div>

    </div>
    <!-- end section slide -->

    <!-- section menu home -->
    <div class="menu-home mt-4">

        <div class="row g-4 " style="align-items: stretch;">
            <div class="col-3">
                <div class="item show-loading-logo-on-click">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="{{route('company_profile')}}">

                        <img src="{{asset('/new/A.png')}}" class="menu-image" alt="menu-image">

                        <div class="text-menu lh-sm ">Profil Perusahaan</div>
                    </a>
                </div>

            </div>
            <div class="col-3">
                <div class="item show-loading-logo-on-click">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="#">

                        <img src="{{asset('/new/B.png')}}" class="menu-image" alt="menu-image">

                        <div class="text-menu lh-sm ">Unit Bisnis</div>
                    </a>
                </div>

            </div>
            <div class="col-3">
                <div class="item show-loading-logo-on-click">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="{{route('home.paket-umroh')}}">

                        <img src="{{asset('/new/C.png')}}" class="menu-image" alt="menu-image">

                        <div class="text-menu lh-sm ">Paket Haji & Umroh</div>
                    </a>
                </div>

            </div>
            <div class="col-3">
                <div class="item show-loading-logo-on-click">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="#">

                        <img src="{{asset('/new/D.png')}}" class="menu-image" alt="menu-image">

                        <div class="text-menu lh-sm ">Galeri</div>
                    </a>
                </div>

            </div>
            <div class="col-3">
                <div class="item show-loading-logo-on-click">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="">
                        <img src="{{asset('/images/LOGO-HIMMAH.png')}}" class="menu-image" alt="menu-image">
                        <div class="text-menu lh-sm ">Himmah Tour and Travel</div>
                    </a>
                </div>

            </div>
            <div class="col-3">
                <div class="item show-loading-logo-on-click">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="{{route('store.index')}}">
                        <img src="{{asset('/images/LOGO-HIMMAH-STORE.png')}}" class="menu-image" alt="menu-image">
                        <div class="text-menu lh-sm ">Himmah Store</div>
                    </a>
                </div>

            </div>
            <div class="col-3">
                <div class="item show-loading-logo-on-click">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="">

                        <i class="menu-image bi bi-house"></i>

                        <div class="text-menu lh-sm ">Pondok Megono</div>
                    </a>
                </div>

            </div>
            <div class="col-3">
                <div class="item show-loading-logo-on-click">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="{{route('compass')}}">

                        <i class="menu-image bi bi-compass"></i>

                        <div class="text-menu lh-sm ">Kompas</div>
                    </a>
                </div>

            </div>


        </div>
    </div>
</div>

@endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
<link rel="stylesheet" href="{{asset('/vendor/owl-carousel/dist/assets/owl.carousel.min.css')}}" />
<link rel="stylesheet" href="{{asset('/vendor/owl-carousel/dist/assets/owl.theme.green.min.css')}}" />
<style>
    .nav-header img {
        width: calc(2vw + 60px);
        height: calc(2vw + 60px);
        margin-right: .5rem;
    }

    .slide-home .item {
        position: relative;
        height: 70vmin;
        border-radius: 10px;
        overflow: hidden;
    }

    /* .owl-carousel .owl-stage-outer {
        border-radius: 10px;
    } */

    .slide-home .item::after {
        inset: 0;
        position: absolute;
        content: "";
        background-image: linear-gradient(to top, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0.3), transparent);
    }

    .slide-home .item img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .slide-home .item .text {
        position: absolute;
        z-index: 4;
        bottom: .5rem;
        left: .5rem;
        right: .5rem;
        color: white;
    }

    .slide-home .owl-item:not(.active) {
        transition: .5s ease-in-out;
        opacity: .6;
    }

    .slide-home .owl-item.active .item a {
        position: relative;
        z-index: 10;
    }

    .owl-theme .owl-dots .owl-dot span {
        margin: 0 2.5px !important;
        transition: .5s ease;
    }

    .owl-theme .owl-dots .owl-dot:hover span {
        background-color: #D6D6D6 !important;
    }

    .owl-theme .owl-dots .owl-dot.active span {
        background-color: #113905 !important;
    }

    .owl-theme .owl-dots .owl-dot.active span {
        width: 30px;
    }

    .menu-home .item a {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
        text-decoration: none;
        justify-content: space-between;
        color: black;
        text-align: center;
    }

    .menu-home .item a .text-menu {
        font-size: calc(10% + 11px);
    }

    .menu-home .item {
        height: 100%;
    }

    /* .menu-home .item .parent-icon {
        width: 98px;
        height: 98px;
        border-radius: 50%;
        background-image: linear-gradient(45deg, #e9ad5b, #cd5e0c, #e48f24, #e9ad5b);
        margin-bottom: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
    } */



    .menu-home .item .menu-image {
        width: calc(10% + 50px);
        height: calc(10% + 50px);
        font-size: calc(10% + 50px);
        margin-bottom: 1rem;
        color: #198754 !important;
        ;
        /* border-radius: 50%; */
        object-fit: contain;

    }

    .menu-home .item img.menu-image {
        margin-top: .5rem;
    }
</style>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="{{asset('/vendor/owl-carousel/dist/owl.carousel.min.js')}}"></script>
<script>
    let owl = $('.owl-carousel.slide-home');
    const stagePadding = 100;
    owl.owlCarousel({
        stagePadding,
        margin: 20,

        items: 1,
        smartSpeed: 500,
        responsive: {
            0: {
                items: 1
            }
        }
    })
    owl.on('changed.owl.carousel', function(event) {
        const {
            count,
            index
        } = event.item;
        let padding = {};
        if (index == 0) {
            padding = {
                'padding-left': '0',
                'padding-right': stagePadding + 'px'
            }
        } else if (index === count - 1) {
            padding = {
                'padding-left': stagePadding * 2 + 'px',
                'padding-right': '0'
            }
        } else {
            padding = {
                'padding-left': stagePadding + 'px',
                'padding-right': stagePadding + 'px',
            }
        }
        $('.owl-stage').css(padding)
    })
    $('.owl-stage').css('padding-left', '0')
</script>
@endsection