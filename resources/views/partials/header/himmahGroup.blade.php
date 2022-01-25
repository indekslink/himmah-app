@section('header')
<div class="fixed-top header-top">
    <div class="row justify-content-center ">
        <div class="col-lg-6 col-md-10 position-relative">
            <img src="/new/M.png" alt="" class="w-100">

            @if($withBack ?? '')
            <div data-current-page="{{route('home')}}" class="icon-back new-style d-flex align-items-center">

                <i class="bi bi-arrow-left-short"></i>
                <i class="bi bi-house-door" style="font-size: 2rem;"></i>
            </div>
            @endif
        </div>
    </div>

</div>

<div class="space-top {{$withBack ?? ''}}"></div>
@endsection

@section('styleHeader')
<style>
    .header-top {
        background-image: linear-gradient(to bottom,
                #113905, #082102);
    }

    .icon-back.new-style {
        top: 120% !important;
        left: 12px !important;
    }

    .header-top::after {
        content: '';
        display: block;
        height: 12px;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(to bottom, #cdb33a, #ead261, #cdb33a);
        right: 0;
        position: absolute;
    }

    .space-top {
        margin-top: calc(10vmax + 15vmin);
    }

    .space-top.yes {
        margin-top: calc(20vmax + 15vmin);
    }
</style>
@endsection