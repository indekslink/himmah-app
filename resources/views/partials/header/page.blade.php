@section('header')
<div class="fixed-top header-top">
    <div class="row justify-content-center ">
        <div class="col-lg-6 col-md-10 position-relative d-flex align-items-center ">
            @if($withBack ?? '')
            <i onclick="backPage()" class=" bi bi-arrow-left-short me-2 mb-2  cursor-pointer display-4 text-light" style="left: 12px;"></i>
            <div class="fs-4 text-light mb-2 py-3 fw-bold">{{$title ?? ''}}</div>

            <!-- <div data-current-page="{{route('home')}}" class="icon-back new-style d-flex align-items-center">

                <i class="bi bi-arrow-left-short"></i>
                <i class="bi bi-house-door" style="font-size: 2rem;"></i>
            </div> -->

            @else
            <div class="fs-4 text-light mb-2 py-3 w-100 text-center fw-bold ">{{$title ?? ''}}</div>
            @endif
        </div>
    </div>

</div>

<div class="space-top {{$withBack ?? ''}}"></div>
<div class="mb-sm-0 mb-2">&nbsp;</div>
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
        margin-top: calc(2vmax + 13vmin + 2vh);
    }
</style>
@endsection