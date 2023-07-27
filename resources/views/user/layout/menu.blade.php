@php($page = Request::segment(1))


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
                    <a href="{{ Asset(env('user') . '/home') }}">Inicio</a>
                </li>
                <li>
                    <a href="{{ Asset(env('user') . '/setting') }}" class=" menu-link">Configuración</a>
                </li>
                <li>
                    <a href="{{ Asset(env('user') . '/cashback') }}" class=" menu-link">CashBack</a>
                </li>
            </ul>
        </div>

    <li>
        <a href="#sidebarAuth" data-bs-toggle="collapse">
            <i class="mdi mdi-file-multiple"></i>
            <span> Catálogo </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarAuth">
            <ul class="nav-second-level">
                <li>
                    <a href="{{ Asset(env('user') . '/category') }}" class=" menu-link">Categorías</a>
                </li>
                <li>
                    <a href="{{ Asset(env('user') . '/item') }}" class=" menu-link">Productos</a>
                </li>
                <li>
                    <a href="{{ Asset(env('user') . '/addon') }}" class=" menu-link">Complementos</a>
                </li>

            </ul>
        </div>
    </li>


    <li>
        <a href="{{ Asset(env('user') . '/reservas') }}" class=" menu-link">
            <i class="mdi mdi-folder-outline"></i>
            <span>
                Reservas </span>
        </a>
    </li>


    <li>
        <a href="#sidebarExpages" data-bs-toggle="collapse">

            <i class="icon-placeholder mdi mdi-cart"></i>
            <?php
                    $cOrder = DB::table('orders')->where('store_id',Auth::user()->id)->where('status',0)->count();
                    $rOrder = DB::table('orders')->where('store_id',Auth::user()->id)->where('status',1)->count();
                    $rrOrder = DB::table('orders')->where('store_id',Auth::user()->id)->where('status',1.5)->count();
                    $rrsOrder = DB::table('orders')->where('store_id',Auth::user()->id)->where('status',4)->count();
                    if($cOrder > 0)
                        {
                    ?>

            <span class="badge bg-success float-end" style="margin-right: 20px">{{ $cOrder }}</span>

            <?php } ?>

            <span> Pedidos </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarExpages">
            <ul class="nav-second-level">
                <li>
                    <a href="{{ Asset('order?status=0') }}" class=" menu-link">
                        @if ($cOrder > 0)
                            <span class="badge bg-success float-end"
                                style="margin-right: 20px">{{ $cOrder }}</span>
                        @endif
                        Nuevos
                    </a>
                </li>
                <li>
                    <a href="{{ Asset('order?status=1') }}" class=" menu-link">
                        @if ($rOrder > 0)
                            <span class="badge bg-success float-end"
                                style="margin-right: 20px">{{ $rOrder }}</span>
                        @endif
                        En ejecución
                    </a>
                </li>
                <li>
                    <a href="{{ Asset('order?status=1.5') }}" class=" menu-link">
                        @if ($rrOrder > 0)
                            <span class="badge bg-success float-end"
                                style="margin-right: 20px">{{ $rrOrder }}</span>
                        @endif
                        En espera
                    </a>
                </li>
                <li>
                    <a href="{{ Asset('order?status=4') }}" class=" menu-link">
                        @if ($rrsOrder > 0)
                            <span class="badge bg-success float-end"
                                style="margin-right: 20px">{{ $rrsOrder }}</span>
                        @endif
                        En Ruta
                    </a>
                </li>
                <li>
                    <a href="{{ Asset('order?status=2') }}" class=" menu-link">

                        Canceladas
                    </a>
                </li>
                <li>
                    <a href="{{ Asset('order?status=5') }}" class=" menu-link">

                        Completadas
                    </a>
                </li>
            </ul>
        </div>
    </li>


    @if (Auth::user()->d_repo == 0)
        <li>
            <a href="{{ Asset('report') }}" class=" menu-link">
                <i class="icon-placeholder mdi mdi-file"></i>
                <span> Reportes </span>
            </a>
        </li>
    @else
        <li hidden>
            <a href="{{ Asset('report') }}" class=" menu-link">
                <i class="icon-placeholder mdi mdi-file"></i>
                <span> Reportes </span>
            </a>
        </li>
    @endif


    <li>
        <a href="{{ Asset(env('user') . '/logout') }}" class="menu-link">
            <i class="icon-placeholder mdi mdi-logout"></i>
            <span> Cerrar sesión </span>
        </a>
    </li>



</ul>
