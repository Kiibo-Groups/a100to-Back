<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Administrador de negocio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->

    <link rel="shortcut icon" href="{{ Asset('assets/img/logo.png') }}" type="image/png" sizes="16x16">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ Asset('assets/css/atmos.css') }}">
    <link rel="stylesheet" href="{{ Asset('assets_admin/css/config/default/bootstrap.min.css') }}" type="text/css"
        id="app-default-stylesheet">

    <link rel="stylesheet" href="{{ Asset('assets_admin/css/config/default/app.min.css') }}" type="text/css"
        id="bs-default-stylesheet">

    <link rel="stylesheet" href="{{ Asset('assets_admin/css/config/default/bootstrap-dark.min.css') }}" type="text/css"
        id="bs-dark-stylesheet" disabled="disabled">

    <link rel="stylesheet" href="{{ Asset('assets_admin/css/config/default/app-dark.min.css') }}" type="text/css"
        id="app-dark-stylesheet" disabled="disabled">

    <!-- icons -->
    <link rel="stylesheet" href="{{ Asset('assets_admin/css/icons.min.css') }}" type="text/css">





</head>

<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0">

                <li class="dropdown notification-list topbar-dropdown">

                    @if ($overview['saldos'] > 0)
                        <!-- Saldo a favor -->
                        <div class="nav-link "> <b style="font-size: 16px; color:black">Tienes un saldo a favor de:</b>
                            <span
                                style="color:green; font-size: 18px;">{{ $currency }}{{ number_format($overview['saldos'], 2) }}
                                <i class="mdi mdi-trending-up"></i></span>
                        </div>
                    @else
                        <!-- Saldo que debe -->
                        <div class="nav-link "> Tienes un saldo deudor de: </div>
                    @endif

                </li>

            </ul>



            <!-- LOGO -->
            <div class="logo-box">
                <a href="/home" class="logo logo-light text-center">
                    <span class="logo-sm">
                        A100TO
                    </span>
                    <span class="logo-lg">
                        A100TO
                    </span>
                </a>
                <a href="/home" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        A100TO
                    </span>
                    <span class="logo-lg" style="font-size: 18px">
                        A100TO
                    </span>
                </a>


            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>
                <li>
                    <h4 class="page-title-main"> Bienvenido(a) ! {{ Auth::user()->name }} </h4>
                </li>
            </ul>

            <div class="clearfix"></div>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="h-100" data-simplebar>
                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    @include('user.layout.menu')

                </div>           
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        @yield('content')

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>

    <script src="{{ Asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ Asset('assets/js/atmos.min.js?v=') }}<?php echo time(); ?>"></script>


    <!-- Vendor js -->

    <script src="{{ Asset('assets_admin/js/vendor.min.js') }}"></script>

    <!-- knob plugin -->

    <script src="{{ Asset('assets_admin/libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ Asset('assets_admin/libs/morris.js06/morris.min.js') }}"></script>
    <script src="{{ Asset('assets_admin/libs/raphael/raphael.min.js') }}"></script>
    <!-- App js-->
    <script src="{{ Asset('assets_admin/js/app.min.js') }}"></script>



    <script src="{{ Asset('assets/vendor/apexchart/apexcharts.min.js') }}"></script>
    <!--chart data for current dashboard-->





</body>

</html>
