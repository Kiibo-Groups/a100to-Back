<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>Panel de Administración</title>

    <link rel="icon" type="image/x-icon" href="{{url('/assets/img/logo.png')}}">
    <link rel="icon" type="image/x-icon" href="{{url('/assets/img/logo.png')}}" type="image/png" sizes="16x16">

    <!-- NewsStyles -->

    <link href="{{ Asset('assets/css/bundle.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/assets/css/line-awesome.min.css')}}">
        <link rel="stylesheet" href="{{url('/assets/css/revolution-settings.min.css')}}">
        <link rel="stylesheet" href="{{url('/assets/css/jquery.fancybox.min.css')}}">

        <link rel="stylesheet" href="{{url('/assets/css/LineIcons.min.css')}}">
        <link rel="stylesheet" href="{{url('/assets/css/slick-theme.css')}}">
        <link rel="stylesheet" href="{{url('/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{url('/assets/css/wow.css')}}">

        <link rel="stylesheet" href="{{url('/assets/css/style.css?v=')}}">



    <!-- NewsStyles -->

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="90">

    <!-- Preloader -->
    <div class="preloader">
        <div class="center">
            <div class="spinner">
                <div class="blob top"></div>
                <div class="blob bottom"></div>
                <div class="blob left"></div>
                <div class="blob move-blob"></div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->

    <!--login start-->
    <section class="p-lg-0 login-sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 order-2 order-lg-1 position-relative d-flex align-items-center bg-1">
                    <div class="login-content text-center text-lg-left">

                        <!--title-->
                        <div class="title d-inline-block mb-4">
                            <h3 class="mb-3 heading">Bienvenido(a) a Prommo</h3>
                            <p class="text">Ingresa los acceso que se te han proporcionado al registrarte con nosotros.</p>
                        </div>

                        @if(Session::has('error'))

                            <div class="alert alert-danger alert-dismissible fade show" style="background-color:#8e1313 !important;border-color:#8e1313;color:#fff !important;" role="alert">
                            <strong>ERROR : </strong> {{ Session::get('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>

                        @endif

                        @if(Session::has('message'))

                            <div class="alert alert-success alert-dismissible fade show" style="background-color:#01a540 !important;border-color:#01a540 !important;color:#fff !important;" role="alert">
                            <strong>SUCCESS : </strong> {{ Session::get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>

                        @endif

                        <!--form-->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-12">
                                <input class="form-control" type="email" name="username" placeholder="Usuario" required="required">
                            </div>
                            <div class="col-12">
                                <input class="form-control" type="password" name="password" placeholder="Contraseña" required="required">
                            </div>
                        </div>
                            <div class="form-button">
                                <button id="submit" type="submit" class="btn btn-large rounded-pill main-btn">Iniciar Sesión</button>
                            </div>
                        </form>



                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="Email" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 ">


                                <div class="d-grid gap-2">
                                    </br>
                                    <button class="btn btn-primary" type="submit">Login</button>
                                    </br>


                                    </br>
                                </div>
                            </div>

                        </form>

















                    </div>


                    <!--bottom nav start-->
                    <div class="bottom-mini-nav">
                        <div class="row no-gutters bg-1">
                            <div class="col-12 col-lg-12 simple-navbar d-flex align-items-center justify-content-start">
                                <nav class="navbar">
                                    <a class="nav-link link" href="https://play.google.com/store/apps/dev?id=9163379332333958723" target="_blank">Descargar Apps</a>
                                    <a class="nav-link link" href="https://soypideme.com/about" target="_blank">Acerca de nosotros</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--bottom nav end-->
                </div>
                <div class="col-12 col-lg-6 p-0 order-1 order-lg-2 login-side-background" style="background-image: url('{{ Asset('assets/img/bg-store.png') }}');">
                    <!--Feature Image Half-->
                </div>
            </div>
        </div>
    </section>
    <!--adress end-->

<!-- JavaScript -->
<script src="{{ Asset('assets/js/bundle.min.js') }}"></script>
<!-- Plugin Js -->
<script src="{{ Asset('assets/js/jquery.fancybox.min.js') }}"></script>

<script src="{{ Asset('assets/js/parallaxie.min.js') }}"></script>
<script src="{{ Asset('assets/js/wow.min.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ Asset('assets/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ Asset('assets/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- SLIDER REVOLUTION EXTENSIONS -->
<script src="{{ Asset('assets/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ Asset('assets/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ Asset('assets/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ Asset('assets/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ Asset('assets/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ Asset('assets/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ Asset('assets/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ Asset('assets/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ Asset('assets/js/extensions/revolution.extension.video.min.js') }}"></script>
<!--Tilt Js-->
<script src="{{ Asset('assets/js/TweenMax.min.js') }}"></script>
<!-- custom script-->
<script src="{{ Asset('assets/js/nouislider.min.js') }}"></script>
<script src="{{ Asset('assets/js/slick.min.js') }}"></script>

<script src="{{ Asset('assets/js/script.js') }}"></script>
</body>
</html>
