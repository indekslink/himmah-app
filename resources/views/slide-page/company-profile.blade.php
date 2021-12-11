@extends('layouts.main')
@section('title','Company Profile')

@section('content')
<div class=" py-2 nav-header sticky-top text-center">
    <i class="bi bi-arrow-left-short icon-back"></i>
    <div class="fs-3 fw-bold">Company Profile</div>
</div>
<div class="value text-justify mt-4">
    <div class="mb-3 d-flex align-items-center">
        <img src="{{asset('/images/LOGO-HIMMAH.png')}}" class="me-4" style="width: 100px;height:100px;" alt="logo himmah">
        <div class="lh-sm">

            <div class="fs-3 font-logo fw-bold">HIMMAH</div>
            <div class="fw-bold">PT. Hijrah Makkah Madinah</div>
        </div>
    </div>
    <p class="fs-3 text-start">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, nesciunt.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae harum quasi nisi dolores nostrum aspernatur nihil eum nemo consequatur earum.</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, inventore. Atque sit animi nobis deleniti ex pariatur iure eaque molestias ab ea doloribus illum, ipsum hic nisi fugit in placeat.</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident odio dignissimos impedit maxime quia earum magnam rerum adipisci sed! Aliquam rerum perferendis doloremque necessitatibus ad et fugiat ducimus at assumenda? Dolore sequi cumque optio doloremque asperiores doloribus distinctio? Nesciunt consectetur beatae earum illo possimus vel commodi nihil ex assumenda aspernatur.</p>

    <!-- visi- -->
    <div class="border-start border-3 border-success bg-light p-2 fs-3 ps-3 mb-2">
        Visi
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, iusto.</p>
    <!-- end visi  -->


    <!-- -misi -->
    <div class="border-start border-3 border-success bg-light p-2 fs-3 ps-3 mb-2">
        Misi
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, iusto.</p>
    <!-- end visi misi -->
</div>
@endsection

@section('style')
<style>
    .value p {
        line-height: 1.4;
    }

    .text-justify {
        text-align: justify !important;
    }
</style>
@endsection