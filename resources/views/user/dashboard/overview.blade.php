<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body widget-user">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 avatar-lg me-3">
                        <span class="avatar-title rounded-circle badge-soft-success"><i class="mdi mdi-food mdi-18px"></i> </span>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="mt-0 mb-1">Articulos totales</h5>
                        <p class="text-muted mb-2 font-13 text-truncate"></p>
                        <h4 class="text-warning"><b>{{ $overview['items'] }}</b></h4>
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
                        <span class="avatar-title rounded-circle badge-soft-danger"><i class="mdi mdi-cart mdi-18px"></i> </span>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="mt-0 mb-1">Pedidos totales</h5>
                        <p class="text-muted mb-2 font-13 text-truncate"></p>
                        <h4 class="text-pink" ><b>{{ $overview['order'] }}</b></h4>
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
                        <span class="avatar-title rounded-circle badge-soft-warning"><i class="mdi mdi-calendar-check mdi-18px"></i> </span>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="mt-0 mb-1">Órdenes completadas</h5>
                        <p class="text-muted mb-2 font-13 text-truncate"></p>
                        <h4 class="text-success"><b>{{ $overview['complete'] }}</b></h4>
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
                        <span class="avatar-title rounded-circle badge-soft-info"><i class="mdi mdi-cart mdi-18px"></i> </span>
                    </div>
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="mt-0 mb-1">Pedidos de este mes</h5>
                        <p class="text-muted mb-2 font-13 text-truncate"></p>
                        <h4 class="text-info"><b >{{ $overview['month'] }}</b></h4>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- end col -->

</div>