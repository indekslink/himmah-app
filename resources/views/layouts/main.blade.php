<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="PT. Hijrah Makkah Madinah">

    <!-- chrome, firefox & opera -->
    <meta name="theme-color" content="#ffffff">

    <!-- windows phone -->
    <meta name="msapplication-navbutton-color" content="#ffffff">

    <meta name="token" content="{{csrf_token()}}">

    <!-- safari/ios -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="transparent">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{asset('/images/LOGO-HIMMAH.png')}}" type="image/x-icon">


    <link rel="stylesheet" href="{{asset('/css/global.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">

    <style>
        .fixed-bottom .item a {
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            text-decoration: none;
            color: black;
        }

        .fixed-bottom .item {
            display: flex;
            align-items: center;
            font-size: 12px;

        }

        .fixed-bottom .user-avatar {
            width: 50px;
            height: 50px;
        }

        .section-content {
            margin-bottom: 100px;
        }
    </style>
    @yield('style')

    <title>@yield('title') - {{config('app.name')}}</title>
</head>

<body>
    <div class="loading-action text-light">
        <div class="bg-dark text-center p-3" style="border-radius: 10px;">

            <div class="spinner-border " style="width: 2rem; height: 2rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="fs-1 lh-1">Loading</div>
        </div>
    </div>
    <div class="parent-loading">
        <img src="{{asset('/images/LOGO-HIMMAH.png')}}" alt="logo-himmah">
        <div class="display-4 fw-bold lh-sm font-logo">HIMMAH</div>
        <div class="fs-4 text-muted lh-sm">PT. Hijrah Makkah Madinah</div>
    </div>
    <div class="container section-content">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('menubottom')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('/js/script.js')}}"></script>


    @yield('script')



</html>