@section('menubottom')

<div class="fixed-bottom bg-white shadow-lg py-1">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 ">
                    <div class="item justify-content-between">
                        <a href="{{request()->is('/')  ? '#' : '/'}}" class="{{request()->is('/') || request()->is('home/*')  ? 'text-success' : ''}}">
                            <i class="bi {{request()->is('/') || request()->is('home/*')  ? 'bi-house-fill' : 'bi-house'}}  fs-5"> </i>
                            <span>Beranda</span>
                        </a>
                        <a href="{{request()->is('store') ? '#' : '/store'}}" class="{{request()->is('store') || request()->is('store/*')  ? 'text-success' : ''}}">
                            <i class="bi {{request()->is('store') || request()->is('store/*')  ? 'bi-bag-fill' : 'bi-bag'}}  fs-5"> </i>
                            <span>Himmah Store</span>
                        </a>
                        <a href="{{request()->is('group')  ? '#' : '/group'}}" class="{{request()->is('group') || request()->is('group/*')  ? 'text-success' : ''}}">
                            <i class="bi {{request()->is('group') || request()->is('group/*')  ? 'bi-people-fill' : 'bi-people'}}  fs-5"> </i>
                            <span>Himmah Group</span>
                        </a>
                        @if(auth()->check())
                        <a href="{{request()->is(auth()->user()->email) ? '#' : '/'.auth()->user()->email}}" class="{{request()->is(auth()->user()->email) || request()->is(auth()->user()->email.'/*')  ? 'text-success' : ''}}">
                            <img class="user-avatar rounded-circle" src="{{avatar(auth()->user()->avatar)}}" alt="">
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
