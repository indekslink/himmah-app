@section('menubottom')

<div class="fixed-bottom section-menu-bottom  shadow-lg py-1" style="background-color:#b9e58e">
    <div class="container px-0">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 ">
                <div class="item " style="justify-content: space-around;">
                    <a href="{{request()->is('/')  ? '#' : '/'}}" class="{{request()->is('/') || request()->is('home/*')  ? 'my-primary-color-darken' : ''}}">
                        <i class="bi {{request()->is('/') || request()->is('home/*')  ? 'bi-house-door-fill' : 'bi-house-door'}}  fs-5"> </i>
                        <span>Beranda</span>
                    </a>
                    <a href="{{request()->is('store') ? '#' : '/store'}}" class="{{request()->is('store') || request()->is('store/*')  ? 'my-primary-color-darken' : ''}}">
                        <i class="bi {{request()->is('store') || request()->is('store/*')  ? 'bi-bag-fill' : 'bi-bag'}}  fs-5"> </i>
                        <span>Himmah Store</span>
                    </a>
                    <a href="{{request()->is('group')  ? '#' : '/group'}}" class="{{request()->is('group') || request()->is('group/*')  ? 'my-primary-color-darken' : ''}}">
                        <i class="bi {{request()->is('group') || request()->is('group/*')  ? 'bi-people-fill' : 'bi-people'}}  fs-5"> </i>
                        <span>Himmah Group</span>
                    </a>
                    @if(auth()->check())
                    <a href="{{request()->is(auth()->user()->email) ? '#' : '/'.auth()->user()->email}}" class="{{request()->is(auth()->user()->email) || request()->is(auth()->user()->email.'/*')  ? 'my-primary-color-darken' : ''}}">
                        <img class="user-avatar rounded-circle fit-cover img-thumbnail" src="{{avatar(auth()->user()->avatar)}}" alt="">
                    </a>
                    @else
                    <a href="{{route('login')}}">
                        <i class="bi bi-box-arrow-right  fs-5"> </i>
                        <span>Masuk</span>
                    </a>
                    <!-- <div class="d-flex align-items-center">
                        <a href="{{route('register')}}" class="text-decoration-none text-success me-3 show-loading-logo-on-click">Daftar</a>
                        <a href="{{route('login')}}" class="text-decoration-none btn btn-success btn show-loading-logo-on-click">Login</a>
                    </div> -->

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection