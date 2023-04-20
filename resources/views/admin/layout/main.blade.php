<!DOCTYPE html>
<html lang="en">

</html>

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


</head>

<body class="loading "
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">

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
                    <h4 class="page-title-main"> Bienvenido(a) ! {{ Auth::guard('admin')->user()->name }} </h4>
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

                    @include('admin.layout.menu')

                </div>
                </section>
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
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'This Entry has been deleted.',
                        'success'
                    )

                    window.location = url;
                }
            })
        }

        function confirmAlert(url) {
            Swal.fire({
                title: 'Are you sure?',
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Changed!',
                        'This Entry has been Changed.',
                        'success'
                    )

                    window.location = url;
                }
            })
        }

        function showMsg(data) {
            Swal.fire(data);
        }
    </script>

    @yield('js')

</body>

</html>
