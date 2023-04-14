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

    <link rel="shortcut icon" href="{{Asset('assets/img/logo.png')}}" type="image/png" sizes="16x16">

    <!-- App css -->

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
                    <span class="logo-sm" >
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

                <!-- User box -->
            

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <li class="menu-title">MENÚ</li>


                        <li>
                          <a href="#email" data-bs-toggle="collapse">
                              <i class="mdi mdi-view-dashboard"></i>
                              <span> Dashboard </span>
                              <span class="menu-arrow"></span>
                          </a>
                          <div class="collapse" id="email">
                              <ul class="nav-second-level">
                                  <li>
                                      <a href="email-inbox.html">Inbox</a>
                                  </li>
                                  <li>
                                      <a href="email-templates.html">Email Templates</a>
                                  </li>
                              </ul>
                          </div>
     
                        <li>
                          <a href="#sidebarAuth" data-bs-toggle="collapse">
                              <i class="mdi mdi-file-multiple"></i>
                              <span> Catalogo </span>
                              <span class="menu-arrow"></span>
                          </a>
                          <div class="collapse" id="sidebarAuth">
                              <ul class="nav-second-level">
                                  <li>
                                      <a href="auth-login.html">Log In</a>
                                  </li>
                                  <li>
                                      <a href="auth-register.html">Register</a>
                                  </li>
                                  <li>
                                      <a href="auth-recoverpw.html">Recover Password</a>
                                  </li>
                               
                              </ul>
                          </div>
                      </li>


                        <li>
                            <a href="apps-calendar.html">
                                <i class="mdi mdi-calendar"></i>
                                <span> Programa de lealtad </span>
                            </a>
                        </li>
                        <li>
                          <a href="#sidebarExpages" data-bs-toggle="collapse">
                              <i class="mdi mdi-layers"></i>
                              <span> Gestionar pedidos                              </span>
                              <span class="menu-arrow"></span>
                          </a>
                          <div class="collapse" id="sidebarExpages">
                              <ul class="nav-second-level">
                                  <li>
                                      <a href="pages-starter.html">Starter</a>
                                  </li>
                                  <li>
                                      <a href="pages-pricing.html">Pricing</a>
                                  </li>
                                  <li>
                                      <a href="pages-timeline.html">Timeline</a>
                                  </li>
                                  <li>
                                      <a href="pages-invoice.html">Invoice</a>
                                  </li>
                                  <li>
                                      <a href="pages-faqs.html">FAQs</a>
                                  </li>
                                  <li>
                                      <a href="pages-gallery.html">Gallery</a>
                                  </li>
                                  <li>
                                      <a href="pages-404.html">Error 404</a>
                                  </li>
                                  <li>
                                      <a href="pages-500.html">Error 500</a>
                                  </li>
                                  <li>
                                      <a href="pages-maintenance.html">Maintenance</a>
                                  </li>
                                  <li>
                                      <a href="pages-coming-soon.html">Coming Soon</a>
                                  </li>
                              </ul>
                          </div>
                      </li>

                        <li>
                            <a href="apps-chat.html">
                                <i class="mdi mdi-forum"></i>
                                <span> Reportes </span>
                            </a>
                        </li>
                        <li class="menu-title mt-2">USUARIO</li>
                        <li>
                          <a href="apps-chat.html">
                              <i class="mdi mdi-forum"></i>
                              <span> Cerrar sesión </span>
                          </a>
                      </li>

                    </ul>

                </div>
                <!-- End Sidebar -->

   

            </div>
            <!-- Sidebar -left -->

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

</body>

</html>
