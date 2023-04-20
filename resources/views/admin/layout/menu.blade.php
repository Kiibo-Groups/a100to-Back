@inject('admin', 'App\Models\Admin')
@php($page = Request::segment(2))


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
                @if ($admin->hasPerm('Dashboard - Inicio'))
                    <li>
                        <a href="{{ Asset(env('admin') . '/home') }}">Inicio</a>
                    </li>
                @endif
                @if ($admin->hasPerm('Dashboard - Configuraciones'))
                    <li>
                        <a href="{{ Asset(env('admin') . '/setting') }}" class=" menu-link">Configuración</a>
                    </li>
                @endif
                @if ($admin->hasPerm('Dashboard - Categorias'))
                    <li>
                        <a href="{{ Asset(env('admin') . '/category') }}" class=" menu-link">Categorias</a>
                    </li>
                @endif
                @if ($admin->hasPerm('Dashboard - Textos de la aplicacion'))
                    <li>
                        <a href="{{ Asset(env('admin') . '/text/add') }}" class=" menu-link">Texto de la aplicación</a>
                    </li>
                @endif
                @if ($admin->hasPerm('Paginas de la aplicacion'))
                    <li>
                        <a href="{{ Asset(env('admin') . '/page/add') }}" class=" menu-link">Páginas de aplicaciones</a>
                    </li>
                @endif

            </ul>
        </div>
    </li>
    <!-- SubCuentas -->
    @if ($admin->hasPerm('Subaccount'))
        <li>
            <a href="{{ Asset(env('admin') . '/adminUser') }}" class=" menu-link">
                <i class="mdi mdi-map-marker"></i>
                <span> SubCuentas </span>
            </a>
        </li>
    @endif
    <!-- SubCuentas -->

    <!-- Banners -->
    @if ($admin->hasPerm('Banners'))
        <li>
            <a href="{{ Asset(env('admin') . '/banner') }}" class=" menu-link">
                <i class="mdi mdi-image"></i>
                <span> Banners </span>
            </a>
        </li>
    @endif
    <!-- Banners -->

    <!-- Ciudades -->
    @if ($admin->hasPerm('Administrar Ciudades'))
        <li>
            <a href="{{ Asset(env('admin') . '/city') }}" class=" menu-link">
                <i class="mdi mdi-map-marker"></i>
                <span> Ciudades </span>
            </a>
        </li>
    @endif
    <!-- Ciudades -->

    <!-- Negocios -->
    @if ($admin->hasPerm('Adminisrtar Restaurantes'))
        <li>
            <a href="{{ Asset(env('admin') . '/user') }}" class=" menu-link">
                <i class="mdi mdi-home"></i>
                <span>
                    Negocios </span>
            </a>
        </li>
    @endif
    <!-- Negocios -->

    <!-- Ofertas de descuento -->
    @if ($admin->hasPerm('Ofertas de descuento'))
        <li>
            <a href="{{ Asset(env('admin') . '/offer') }}" class=" menu-link">
                <i class="mdi mdi-calendar"></i>
                <span>
                    Ofertas </span>
            </a>
        </li>
    @endif
    <!-- Ofertas de descuento -->

    <!-- Repartidores -->
    @if ($admin->hasPerm('Repartidores'))
        <li>
            <a href="#repartidores" data-bs-toggle="collapse">
                <i class="mdi mdi-account-clock"></i>
                <span> Repartidores </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="repartidores">
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ Asset(env('admin') . '/delivery') }}">Listado</a>
                    </li>
                    <li>
                        <a href="{{ Asset(env('admin') . '/report_staff') }}" class=" menu-link">Reportes</a>
                    </li>
                </ul>
            </div>
        </li>
    @endif

    <!-- Gestion de pedidos -->
    <?php
    $cOrder = DB::table('orders')
        ->where('status', 0)
        ->count();
    $ROrder = DB::table('orders')
        ->whereIn('status', [1, 1.5, 3, 4])
        ->count();
    ?>

    @if ($admin->hasPerm('Gestion de pedidos'))
        <li>
            <a href="#pedidos" data-bs-toggle="collapse">
                <i class="mdi mdi-cart"></i>
                @if ($cOrder > 0)
                    <span class="badge bg-success float-end" style="margin-right: 20px">{{ $cOrder }}</span>
                @endif
                <span> Pedidos </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="pedidos">
                <!--submenu-->
                <ul class="nav-second-level">
                    <!-- Pedidos nuevos -->
                    <li>
                        <a href="{{ Asset(env('admin') . '/order?status=0') }}">
                            @if ($cOrder > 0)
                                <span class="badge bg-success float-end"
                                    style="margin-right: 20px">{{ $cOrder }}</span>
                            @endif
                            Nuevos
                        </a>
                    </li>
                    <!-- Pedidos nuevos -->

                    <!-- Pedidos en curso -->
                    <li>
                        <a href="{{ Asset(env('admin') . '/order?status=1') }}">
                            @if ($ROrder > 0)
                                <span class="badge bg-success float-end"
                                    style="margin-right: 20px">{{ $ROrder }}</span>
                            @endif
                            En Curso
                        </a>
                    </li>
                    <!-- Pedidos en curso -->

                    <!-- Pedidos cancelados -->
                    <li>
                        <a href="{{ Asset(env('admin') . '/order?status=2') }}">Cancelados</a>
                    </li>
                    <!-- Pedidos cancelados -->

                    <!-- Pedidos completos -->
                    <li>
                        <a href="{{ Asset(env('admin') . '/order?status=5') }}">Completos</a>
                    </li>
                    <!-- Pedidos completos -->
                </ul>
            </div>
        </li>
    @endif
    <!-- Gestion de pedidos -->

    <!-- Notificaciones push -->
    @if ($admin->hasPerm('Notificaciones push'))
           <li>
            <a href="{{ Asset(env('admin') . '/push') }}" class=" menu-link">
                <i class="mdi mdi-send"></i>
                <span>
                    Notificaciones </span>
            </a>
        </li>
    @endif
    <!-- Notificaciones push -->








</ul>













<style type="text/css">
    .menu-item {
        border-bottom: 1px solid #0b394f !important;
    }
</style>

<div class="admin-sidebar-brand">
    <!-- begin sidebar branding-->
    <span class="admin-brand-content font-secondary">
        <a href="{{ Asset(env('admin') . '/home') }}">
            <img class="admin-brand-logo" src="{{ Asset('upload/admin/' . Auth::guard('admin')->user()->logo) }}"
                width="40" alt="admin Logo">
            {{ Auth::guard('admin')->user()->name }}
        </a>
    </span>
    <!-- end sidebar branding-->
    <div class="ml-auto">
        <!-- sidebar pin-->
        <a href="#" class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"></a>
        <!-- sidebar close for mobile device-->
        <a href="#" class="admin-close-sidebar"></a>
    </div>
</div>

<div class="admin-sidebar-wrapper js-scrollbar">
    <ul class="menu">




        <!-- Reporte de ventas -->
        @if ($admin->hasPerm('Reportes de ventas'))
            <li class="menu-item @if ($page === 'report') active @endif">
                <a href="{{ Asset(env('admin') . '/report') }}" class="menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Reporte de ventas</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-file"></i>
                    </span>
                </a>
            </li>
        @endif
        <!-- Reporte de ventas -->

        <!-- Usuarios -->
        @if ($admin->hasPerm('Usuarios Registrados'))
            <li class="menu-item @if ($page === 'appUser' || $page == 'report_users') active @endif">
                <a href="#" class="open-dropdown menu-link">
                    <span class="menu-label">
                        <span class="menu-name">Usuarios Registrados
                            <span class="menu-arrow"></span>
                        </span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder mdi mdi-account"></i>
                    </span>
                </a>
                <!--submenu-->
                <ul class="sub-menu">
                    <li class="menu-item">
                        <a href="{{ Asset(env('admin') . '/appUser') }}" class=" menu-link">
                            <span class="menu-label">
                                <span class="menu-name">Listado</span>
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder  mdi mdi-image-filter">
                                </i>
                            </span>
                        </a>
                    </li>

                    <li class="menu-item ">
                        <a href="{{ Asset(env('admin') . '/report_users') }}" class=" menu-link">
                            <span class="menu-label">
                                <span class="menu-name">Reportes</span>
                            </span>
                            <span class="menu-icon">
                                <i class="icon-placeholder  mdi mdi-image">
                                </i>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <!-- Usuarios -->

        <!-- Cerrar Sesión -->
        <li class="menu-item">
            <a href="{{ Asset(env('admin') . '/logout') }}" class="menu-link">
                <span class="menu-label">
                    <span class="menu-name">Cerrar Sesion</span>
                </span>
                <span class="menu-icon">
                    <i class="icon-placeholder mdi mdi-logout"></i>
                </span>
            </a>
        </li>
        <!-- Cerrar Sesión -->
    </ul>
</div>
