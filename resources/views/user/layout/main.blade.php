<!DOCTYPE html>
<html lang="en"></html>

<head>
    <style>
    #div2 {
        max-height: 100%;
        overflow: auto;
    }
    </style>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ Asset('assets/img/logo.png') }}" />
    <link rel="icon" href="{{ Asset('assets/img/logo.png') }}" type="image/png" sizes="16x16">


    <!-- Plugins css -->


    <link rel="stylesheet" href="{{ Asset('assets_admin/libs/spectrum-colorpicker2/spectrum.min.css') }}"
        type="text/css">
    <link rel="stylesheet" href="{{ Asset('assets_admin/libs/flatpickr/flatpickr.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ Asset('assets_admin/libs/clockpicker/bootstrap-clockpicker.min.css') }}"
        type="text/css">
    <link rel="stylesheet" href="{{ Asset('assets_admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        type="text/css">
    <link rel="stylesheet" href="{{ Asset('assets_admin/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        type="text/css">



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

    @yield('css')
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "4e770d1a-beba-4efe-97b0-bee51f3fea77",
            });
        });
    </script>

</head>

<body class="loading "
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

    <div id="wrapper">
        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-end mb-0" style="margin-top: 10px; margin-right: 70px">

                <li class="dropdown notification-list topbar-dropdown">
                    @php
                        $user 	= new App\Models\User;
                        $overview = $user->overview();
			            $currency  = App\Models\Admin::find(1)->currency;
                    @endphp

                    @if ($overview['saldos'] > 0)
                        <!-- Saldo a favor -->
                        <div class="nav-link "> <b style="font-size: 16px; color:black">Tienes un saldo a favor de:</b>
                            <span
                                style="color:green; font-size: 18px;">{{ $currency }}{{ number_format($overview['saldos'], 2) }}
                                <i class="mdi mdi-trending-up"></i></span>
                        </div>
                    @else
                        <!-- Saldo que debe -->
                  
                        <div class="nav-link "> <b style="font-size: 16px; color:black">Tienes un saldo deudor de:</b>
                            <span
                                style="color:red; font-size: 18px;">{{ $currency }}{{ number_format($overview['saldos'], 2) }}
                                <i class="mdi mdi-trending-up"></i></span>
                        </div>
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
                <a href="{{ Asset(env('user') . '/home') }}" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        A100TO
                    </span>
                    <span class="logo-lg" >
                        <img src="{{ Asset('assets/img/logo.png') }}" alt="" height="86">
                    </span>
                </a>
            </div>
            <div class="row ">
                <div class="col-lg-11 mx-auto mt-2">

                    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                        <li>
                            <button class="button-menu-mobile disable-btn waves-effect">
                                <i class="fe-menu"></i>
                            </button>
                        </li>
                        <li>
                           
                            <h4 class="page-title-main" style="padding: 0 24px"> Bienvenido(a) ! {{ Auth::user()->name }} </h4>
                        </li>
                    </ul>
                </div>
            </div>

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
    <script src="{{ Asset('assets/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ Asset('assets/vendor/popper/popper.js') }}"></script>
    <script src="{{ Asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ Asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ Asset('assets/vendor/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ Asset('assets/js/atmos.min.js?v=') }}<?php echo time(); ?>"></script>
    <!-- Vendor js -->
    <script src="{{ Asset('assets_admin/js/vendor.min.js') }}"></script>
    <!-- Plugins js-->
    <script src="{{ Asset('assets_admin/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ Asset('assets_admin/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
    <script src="{{ Asset('assets_admin/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ Asset('assets_admin/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Init js-->
    <script src="{{ Asset('assets_admin/js/pages/form-pickers.init.js') }}"></script>
    <!-- knob plugin -->
    <script src="{{ Asset('assets_admin/libs/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- App js-->
    <script src="{{ Asset('assets_admin/js/app.min.js') }}"></script>
    <script src="{{ Asset('assets/vendor/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ Asset('assets/vendor/sweetalert/sweetalert2.all.min.js') }}"></script>

    <script>
        $(function() {
            $(".datepicker").datepicker();

        });


        function deleteConfirm(url) {
            Swal.fire({
                title: 'Estas seguro(a)',
                text: "No podrás revertir esto!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminarlo!',
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Eliminado!',
                        'Esta entrada ha sido eliminada.',
                        'success'
                    )

                    window.location = url;
                }
            })
        }

        function confirmAlert(url) {
            Swal.fire({
                title: 'Estas seguro(a)',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, hazlo!',
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Cambiado!',
                        'Esta entrada ha sido modificada.',
                        'success'
                    )

                    window.location = url;
                }
            })
        }
    </script>

    @yield('js')

</body>

</html>
