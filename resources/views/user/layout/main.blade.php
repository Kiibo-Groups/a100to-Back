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
                              <span> Elementos de catalogo </span>
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

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-4">Total Revenue</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1 float-start" dir="ltr">
                                            <input data-plugin="knob" data-width="70" data-height="70"
                                                data-fgColor="#f05050 " data-bgColor="#F9B9B9" value="58"
                                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                data-thickness=".15" />
                                        </div>

                                        <div class="widget-detail-1 text-end">
                                            <h2 class="fw-normal pt-2 mb-1"> 256 </h2>
                                            <p class="text-muted mb-1">Revenue today</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Sales Analytics</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-end">
                                            <span class="badge bg-success rounded-pill float-start mt-3">32% <i
                                                    class="mdi mdi-trending-up"></i> </span>
                                            <h2 class="fw-normal mb-1"> 8451 </h2>
                                            <p class="text-muted mb-3">Revenue today</p>
                                        </div>
                                        <div class="progress progress-bar-alt-success progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 77%;">
                                                <span class="visually-hidden">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-4">Statistics</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1 float-start" dir="ltr">
                                            <input data-plugin="knob" data-width="70" data-height="70"
                                                data-fgColor="#ffbd4a" data-bgColor="#FFE6BA" value="80"
                                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                data-thickness=".15" />
                                        </div>
                                        <div class="widget-detail-1 text-end">
                                            <h2 class="fw-normal pt-2 mb-1"> 4569 </h2>
                                            <p class="text-muted mb-1">Revenue today</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Daily Sales</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-end">
                                            <span class="badge bg-pink rounded-pill float-start mt-3">32% <i
                                                    class="mdi mdi-trending-up"></i> </span>
                                            <h2 class="fw-normal mb-1"> 158 </h2>
                                            <p class="text-muted mb-3">Revenue today</p>
                                        </div>
                                        <div class="progress progress-bar-alt-pink progress-sm">
                                            <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="77"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                                <span class="visually-hidden">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0">Daily Sales</h4>

                                    <div class="widget-chart text-center">
                                        <div id="morris-donut-example" dir="ltr" style="height: 245px;"
                                            class="morris-chart"></div>
                                        <ul class="list-inline chart-detail-list mb-0">
                                            <li class="list-inline-item">
                                                <h5 style="color: #ff8acc;"><i class="fa fa-circle me-1"></i>Series A
                                                </h5>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 style="color: #5b69bc;"><i class="fa fa-circle me-1"></i>Series B
                                                </h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mt-0">Statistics</h4>
                                    <div id="morris-bar-example" dir="ltr" style="height: 280px;"
                                        class="morris-chart"></div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>
                                    <h4 class="header-title mt-0">Total Revenue</h4>
                                    <div id="morris-line-example" dir="ltr" style="height: 280px;"
                                        class="morris-chart"></div>
                                </div>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-lg me-3">
                                            <img src="../assets/images/users/user-3.jpg"
                                                class="img-fluid rounded-circle" alt="user">
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="mt-0 mb-1">Chadengle</h5>
                                            <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                            <small class="text-warning"><b>Admin</b></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-lg me-3">
                                            <img src="../assets/images/users/user-2.jpg"
                                                class="img-fluid rounded-circle" alt="user">
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="mt-0 mb-1"> Michael Zenaty</h5>
                                            <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                            <small class="text-pink"><b>Support Lead</b></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-lg me-3">
                                            <img src="../assets/images/users/user-1.jpg"
                                                class="img-fluid rounded-circle" alt="user">
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="mt-0 mb-1">Stillnotdavid</h5>
                                            <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                            <small class="text-success"><b>Designer</b></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-body widget-user">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0 avatar-lg me-3">
                                            <img src="../assets/images/users/user-10.jpg"
                                                class="img-fluid rounded-circle" alt="user">
                                        </div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="mt-0 mb-1">Tomaslau</h5>
                                            <p class="text-muted mb-2 font-13 text-truncate">coderthemes@gmail.com</p>
                                            <small class="text-info"><b>Developer</b></small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                    </div>
                    <!-- end row -->


                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mb-3">Inbox</h4>

                                    <div class="inbox-widget">

                                        <div class="inbox-item">
                                            <a href="#">
                                                <div class="inbox-item-img"><img
                                                        src="../assets/images/users/user-1.jpg" class="rounded-circle"
                                                        alt=""></div>
                                                <h5 class="inbox-item-author mt-0 mb-1">Chadengle</h5>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">13:40 PM</p>
                                            </a>
                                        </div>

                                        <div class="inbox-item">
                                            <a href="#">
                                                <div class="inbox-item-img"><img
                                                        src="../assets/images/users/user-2.jpg" class="rounded-circle"
                                                        alt=""></div>
                                                <h5 class="inbox-item-author mt-0 mb-1">Tomaslau</h5>
                                                <p class="inbox-item-text">I've finished it! See you so...</p>
                                                <p class="inbox-item-date">13:34 PM</p>
                                            </a>
                                        </div>

                                        <div class="inbox-item">
                                            <a href="#">
                                                <div class="inbox-item-img"><img
                                                        src="../assets/images/users/user-3.jpg" class="rounded-circle"
                                                        alt=""></div>
                                                <h5 class="inbox-item-author mt-0 mb-1">Stillnotdavid</h5>
                                                <p class="inbox-item-text">This theme is awesome!</p>
                                                <p class="inbox-item-date">13:17 PM</p>
                                            </a>
                                        </div>

                                        <div class="inbox-item">
                                            <a href="#">
                                                <div class="inbox-item-img"><img
                                                        src="../assets/images/users/user-4.jpg" class="rounded-circle"
                                                        alt=""></div>
                                                <h5 class="inbox-item-author mt-0 mb-1">Kurafire</h5>
                                                <p class="inbox-item-text">Nice to meet you</p>
                                                <p class="inbox-item-date">12:20 PM</p>
                                            </a>
                                        </div>

                                        <div class="inbox-item">
                                            <a href="#">
                                                <div class="inbox-item-img"><img
                                                        src="../assets/images/users/user-5.jpg" class="rounded-circle"
                                                        alt=""></div>
                                                <h5 class="inbox-item-author mt-0 mb-1">Shahedk</h5>
                                                <p class="inbox-item-text">Hey! there I'm available...</p>
                                                <p class="inbox-item-date">10:15 AM</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="dropdown float-end">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title mt-0 mb-3">Latest Projects</h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Project Name</th>
                                                    <th>Start Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th>Assign</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Adminto Admin v1</td>
                                                    <td>01/01/2017</td>
                                                    <td>26/04/2017</td>
                                                    <td><span class="badge bg-danger">Released</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Adminto Frontend v1</td>
                                                    <td>01/01/2017</td>
                                                    <td>26/04/2017</td>
                                                    <td><span class="badge bg-success">Released</span></td>
                                                    <td>Adminto admin</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Adminto Admin v1.1</td>
                                                    <td>01/05/2017</td>
                                                    <td>10/05/2017</td>
                                                    <td><span class="badge bg-pink">Pending</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Adminto Frontend v1.1</td>
                                                    <td>01/01/2017</td>
                                                    <td>31/05/2017</td>
                                                    <td><span class="badge bg-purple">Work in Progress</span>
                                                    </td>
                                                    <td>Adminto admin</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Adminto Admin v1.3</td>
                                                    <td>01/01/2017</td>
                                                    <td>31/05/2017</td>
                                                    <td><span class="badge bg-warning">Coming soon</span></td>
                                                    <td>Coderthemes</td>
                                                </tr>

                                                <tr>
                                                    <td>6</td>
                                                    <td>Adminto Admin v1.3</td>
                                                    <td>01/01/2017</td>
                                                    <td>31/05/2017</td>
                                                    <td><span class="badge bg-primary">Coming soon</span></td>
                                                    <td>Adminto admin</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div><!-- end col -->

                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; Adminto theme by <a href="">Coderthemes</a>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-sm-block">
                                <a href="javascript:void(0);">About Us</a>
                                <a href="javascript:void(0);">Help</a>
                                <a href="javascript:void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">

        <div data-simplebar class="h-100">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>

            <!-- Tab panes -->
            <div class="tab-content pt-0">

                <div class="tab-pane active" id="settings-tab" role="tabpanel">

                    <div class="p-3">
                        <div class="alert alert-warning" role="alert">
                            <strong>Customize </strong> the overall color scheme, Layout, etc.
                        </div>

                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                                id="light-mode-check" checked />
                            <label class="form-check-label" for="light-mode-check">Light Mode</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                                id="dark-mode-check" />
                            <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                        </div>

                        <!-- Width -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="width" value="fluid"
                                id="fluid-check" checked />
                            <label class="form-check-label" for="fluid-check">Fluid</label>
                        </div>
                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="width" value="boxed"
                                id="boxed-check" />
                            <label class="form-check-label" for="boxed-check">Boxed</label>
                        </div>

                        <!-- Menu positions -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="menus-position" value="fixed"
                                id="fixed-check" checked />
                            <label class="form-check-label" for="fixed-check">Fixed</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="menus-position" value="scrollable"
                                id="scrollable-check" />
                            <label class="form-check-label" for="scrollable-check">Scrollable</label>
                        </div>

                        <!-- Left Sidebar-->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="light"
                                id="light-check" />
                            <label class="form-check-label" for="light-check">Light</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="dark"
                                id="dark-check" checked />
                            <label class="form-check-label" for="dark-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color" value="brand"
                                id="brand-check" />
                            <label class="form-check-label" for="brand-check">Brand</label>
                        </div>

                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-color"
                                value="gradient" id="gradient-check" />
                            <label class="form-check-label" for="gradient-check">Gradient</label>
                        </div>

                        <!-- size -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="default"
                                id="default-size-check" checked />
                            <label class="form-check-label" for="default-size-check">Default</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size"
                                value="condensed" id="condensed-check" />
                            <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small
                                    size)</small></label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="compact"
                                id="compact-check" />
                            <label class="form-check-label" for="compact-check">Compact <small>(Small
                                    size)</small></label>
                        </div>

                        <!-- User info -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="leftsidebar-user" value="fixed"
                                id="sidebaruser-check" />
                            <label class="form-check-label" for="sidebaruser-check">Enable</label>
                        </div>


                        <!-- Topbar -->
                        <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="dark"
                                id="darktopbar-check" checked />
                            <label class="form-check-label" for="darktopbar-check">Dark</label>
                        </div>

                        <div class="form-check form-switch mb-1">
                            <input type="checkbox" class="form-check-input" name="topbar-color" value="light"
                                id="lighttopbar-check" />
                            <label class="form-check-label" for="lighttopbar-check">Light</label>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                            <a href="https://1.envato.market/admintoadmin" class="btn btn-danger mt-3"
                                target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                        </div>

                    </div>

                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->

    <script src="{{ Asset('assets_admin/js/vendor.min.js') }}"></script>

    <!-- knob plugin -->

    <script src="{{ Asset('assets_admin/libs/jquery-knob/jquery.knob.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ Asset('assets_admin/libs/morris.js06/morris.min.js') }}"></script>
    <script src="{{ Asset('assets_admin/libs/raphael/raphael.min.js') }}"></script>

    <!-- Dashboar init js-->

    <script src="{{ Asset('assets_admin/js/pages/dashboard.init.js') }}"></script>

    <!-- App js-->

    <script src="{{ Asset('assets_admin/js/app.min.js') }}"></script>

</body>

</html>
