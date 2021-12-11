@extends('layouts.main')
@section('title','Home')

@section('content')
<div>
    <!-- section header top -->
    <div class="d-flex align-items-center py-2 nav-header sticky-top justify-content-between">
        <div class="d-flex align-items-center logo-place">
            <img class="" src="{{asset('/images/LOGO-HIMMAH.png')}}" alt="logo himmah">
            <div class="fs-3 fw-bold font-logo">HIMMAH</div>
        </div>
        @if(auth()->check())
        <div class="dropdown">

            <i id="user-data" data-bs-toggle="dropdown" aria-expanded="false" class="bi cursor-pointer bi-person-circle fs-1  text-success"></i>
            <ul class="dropdown-menu" aria-labelledby="user-data">
                <li> <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
        @else
        <div class="d-flex align-items-center">
            <a href="{{route('register')}}" class="text-decoration-none text-success me-3">Daftar</a>
            <a href="{{route('login')}}" class="text-decoration-none btn btn-success btn">Login</a>
        </div>
        @endif
    </div>
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
            <img src="{{asset('/images/slide-home/makkah.jpeg')}}" alt="slide-image">
            <div class="text">
                <div class="fs-4 fw-bold lh-sm ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, beatae.</div>

            </div>
        </div>
        <div class="item">
            <img src="{{asset('/images/slide-home/makkah-2.jpg')}}" alt="slide-image">
            <div class="text">
                <div class="fs-4 fw-bold lh-sm ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, beatae.</div>

            </div>
        </div>
        <div class="item">
            <img src="{{asset('/images/slide-home/travel.jpg')}}" alt="slide-image">
            <!-- <div class="text">
                <div class="fs-1">Lorem ipsum dolor sit amet.</div>
                <div class="fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, veritatis!</div>
            </div> -->
        </div>
        <div class="item">
            <img src="{{asset('/images/slide-home/accessories.jfif')}}" alt="slide-image">
            <!-- <div class="text">
                <div class="fs-1">Lorem ipsum dolor sit amet.</div>
                <div class="fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, veritatis!</div>
            </div> -->
        </div>
    </div>
    <!-- end section slide -->

    <!-- section menu home -->
    <div class="menu-home mt-4">

        <div class="row g-4 justify-content-center align-items-center">
            <div class="col-4">
                <div class="item">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="{{route('company_profile')}}">
                        <i class="menu-image bi bi-bank2"></i>
                        <div class="fs-6 lh-sm ">Profil Perusahaan</div>
                    </a>
                </div>

            </div>
            <div class="col-4">
                <div class="item">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="">
                        <img src="{{asset('/images/LOGO-HIMMAH-GROUP.png')}}" class="menu-image" alt="menu-image">
                        <div class="fs-6 lh-sm ">Himmah Group</div>
                    </a>
                </div>

            </div>
            <div class="col-4">
                <div class="item">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="">
                        <img src="{{asset('/images/LOGO-HIMMAH-STORE.png')}}" class="menu-image" alt="menu-image">
                        <div class="fs-6 lh-sm ">Himmah Store</div>
                    </a>
                </div>

            </div>
            <div class="col-4">
                <div class="item">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="">
                        <i class="menu-image bi bi-house-door"></i>
                        <div class="fs-6 lh-sm ">Pondok Megono</div>
                    </a>
                </div>

            </div>
            <div class="col-4">
                <div class="item">
                    <!-- don't worry.  this anchor have been set to display block -->
                    <a href="{{route('compass')}}">
                        <i class="menu-image bi bi-compass"></i>
                        <div class="fs-6 lh-sm ">Kompas</div>
                    </a>
                </div>

            </div>


        </div>
    </div>
</div>

<!-- <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
          

            {{ __('You are logged in!') }}
        </div>
    </div> -->


@endsection
@section('style')
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
        height: 50vmin;
        border-radius: 10px;
        overflow: hidden;
    }

    .owl-carousel .owl-stage-outer {
        border-radius: 10px;
    }

    .slide-home .item::after {
        inset: 0;
        position: absolute;
        content: "";
        background-image: linear-gradient(45deg, rgba(0, 0, 0, .5), rgba(0, 0, 0, 0.3), transparent);
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

    .owl-theme .owl-dots .owl-dot span {
        margin: 0 2.5px !important;
        transition: .5s ease;
    }

    .owl-theme .owl-dots .owl-dot:hover span {
        background-color: #D6D6D6 !important;
    }

    .owl-theme .owl-dots .owl-dot.active span {
        background-color: #198754 !important;
    }

    .owl-theme .owl-dots .owl-dot.active span {
        width: 30px;
    }

    .menu-home .item a {
        display: block;
        text-decoration: none;
        color: black;
        text-align: center;
    }

    .menu-home .item img.menu-image {
        margin-bottom: 1rem;
    }

    .menu-home .item .menu-image {
        width: calc(10% + 80px);
        height: calc(10% + 80px);
        font-size: calc(10% + 80px);
        color: #198754 !important;
        ;
        /* border-radius: 50%; */
        object-fit: cover;

    }
</style>
@endsection

@section('script')
<script src="{{asset('/vendor/owl-carousel/dist/owl.carousel.min.js')}}"></script>
<script>
    let owl = $('.owl-carousel.slide-home')
    const stagePadding = 20;
    owl.owlCarousel({
        stagePadding,
        margin: 12,
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