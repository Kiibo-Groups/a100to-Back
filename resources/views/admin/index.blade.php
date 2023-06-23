<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>Panel Administrativo</title>

    <link rel="icon" type="image/x-icon" href="{{ Asset('assets/img/logo.png') }}" />
    <link rel="icon" href="{{ Asset('assets/img/logo.png') }}" type="image/png" sizes="16x16">

    <!-- NewsStyles -->


    <link rel="stylesheet" href="{{ Asset('assets_admin/css/config/default/bootstrap.min.css') }}"
        type="text/css" id="app-default-stylesheet">

    <link rel="stylesheet" href="{{ Asset('assets_admin/css/config/default/app.min.css') }}" type="text/css"
        id="bs-default-stylesheet">

    <link rel="stylesheet" href="{{ Asset('assets_admin/css/config/default/bootstrap-dark.min.css') }}"
        type="text/css" id="bs-dark-stylesheet" disabled="disabled">

    <link rel="stylesheet" href="{{ Asset('assets_admin/css/config/default/app-dark.min.css') }}" type="text/css"
        id="app-dark-stylesheet" disabled="disabled">

    <!-- icons -->
    <link rel="stylesheet" href="{{ Asset('assets_admin/css/icons.min.css') }}" type="text/css">






    <!-- NewsStyles -->

</head>

<body class="loading authentication-bg authentication-bg-pattern">


    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <a href="index.html">
                            <img src="{{ Asset('assets/img/Logoblancotransparente.png') }}" alt=""
                                height="82" class="mx-auto">
                        </a>
                        <p class="text-muted mt-2 mb-4"></p>

                    </div>
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0">Bienvenido(a)</h4>
                            </div>
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>ERROR : </strong> {{ Session::get('error') }}
                                </div>
                            @endif

                            @if (Session::has('message'))
                                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>SUCCESS : </strong> {{ Session::get('message') }}
                                </div>
                            @endif

                            <form class="needs-validation" action="{{ $form_url }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Nombre de usuario</label>
                                    <input class="form-control" type="text" name="username" placeholder="Usuario"
                                        required="required">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input class="form-control" type="password" name="password" placeholder="Contraseña"
                                        required="required">
                                </div>


                                <div class="mb-3 d-grid text-center">
                                    <button class="btn " style="background-color: #ff914d; color: #fff"
                                        type="submit"> Iniciar Sesión </button>
                                </div>
                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->



                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->





    <!--adress end-->

    <script src="{{ Asset('assets_admin/js/vendor.min.js') }}"></script>

    <!-- App js -->

    <script src="{{ Asset('assets_admin/js/app.min.js') }}"></script>
</body>

</html>
