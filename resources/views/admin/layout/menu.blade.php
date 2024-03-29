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
                @if ($admin->hasPerm('Paginas de la aplicacion'))
                    <li>
                        <a href="{{ Asset(env('admin') . '/page/add') }}" class=" menu-link">Páginas de aplicaciones</a>
                    </li>
                @endif

            </ul>
        </div>
    </li>


    <!-- Banners  
    @if ($admin->hasPerm('Banners'))
        <li>
            <a href="{{ Asset(env('admin') . '/banner') }}" class=" menu-link">
                <i class="mdi mdi-image"></i>
                <span> Banners </span>
            </a>
        </li>
    @endif
      Banners -->

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
            <a href="#negocios" data-bs-toggle="collapse">
                <i class="mdi mdi-home"></i>
                <span> Negocios </span>
                <span class="menu-arrow"></span>
            </a>

            <div class="collapse" id="negocios">
                <!--submenu-->
                <ul class="nav-second-level">
                    @if ($admin->hasPerm('Dashboard - Categorias'))
                        <li>
                            <a href="{{ Asset(env('admin') . '/category') }}" class=" menu-link">Categorias</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ Asset(env('admin') . '/user') }}">Listado</a>
                    </li>
                </ul>
            </div>
        </li>
    @endif
    <!-- Negocios -->

    <!-- Ofertas de descuento -->
    @if ($admin->hasPerm('Ofertas de descuento'))
        <li>
            <a href="{{ Asset(env('admin') . '/giftcards') }}" class=" menu-link">
                <i class="mdi mdi-calendar"></i>
                <span>
                    GiftCards 
                </span>
            </a>
        </li>
    @endif

    <!-- Reservas -->
    @if ($admin->hasPerm('Reservas'))
        <li>
            <a href="{{ Asset(env('admin') . '/reservas') }}" class=" menu-link">
                <i class="mdi mdi-folder-outline"></i>
                <span>
                    Reservas </span>
            </a>
        </li>
    @endif
    <!-- Reservas -->

    <!-- Reservas -->
    @if ($admin->hasPerm('Recompensas'))
    <li>
        <a href="{{ Asset(env('admin') . '/recompensas') }}" class=" menu-link">
            <i class="mdi mdi-file-outline"></i>
            <span>
                Recompensas </span>
        </a>
    </li>
    @endif
    <!-- Reservas -->

    <!-- Tickets -->
    @if ($admin->hasPerm('Tickets'))
        <li>
            <a href="{{ Asset(env('admin') . '/tickets') }}" class=" menu-link">
                <i class="mdi mdi-ticket"></i>
                <span>
                    Tickets </span>
            </a>
        </li>
    @endif
    <!-- Tickets -->

    <!-- Sociales -->
    @if ($admin->hasPerm('Causas sociales'))
        <li>
            <a href="{{ Asset(env('admin') . '/sociales') }}" class=" menu-link">
                <i class="mdi mdi-human"></i>
                <span>
                    Causas sociales </span>
            </a>
        </li>
    @endif
    <!-- Sociales -->

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

    <!-- Usuarios -->
    @if ($admin->hasPerm('Usuarios Registrados'))
        <li>
            <a href="#usuarios" data-bs-toggle="collapse">
                <i class="mdi mdi-account"></i>
                <span> Usuarios </span>
                <span class="menu-arrow"></span>
            </a>
            <!--submenu-->

            <div class="collapse" id="usuarios">
                <!--submenu-->
                <ul class="nav-second-level">
                    <li>
                        <a href="{{ Asset(env('admin') . '/appUser') }}">Listado</a>
                    </li>
                    <!--
                    <li>
                        <a href="{{ Asset(env('admin') . '/report_users') }}">Reportes</a>
                    </li>
                    -->
                </ul>
            </div>

        </li>
    @endif
    <!-- Usuarios -->

    <li>
        <a href="{{ Asset(env('admin') . '/logout') }}" class=" menu-link">
            <i class="mdi mdi-logout"></i>
            <span>
                Cerrar Sesion </span>
        </a>
    </li>

</ul>
