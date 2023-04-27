
    <div class="row">

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">Artículos totales</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-start" dir="ltr">
                            <div class="flex-shrink-0 avatar-lg me-3">
                                <span class="avatar-title rounded-circle badge-soft-success"><i class="mdi mdi-food mdi-18px"></i> </span>
                            </div>
                        </div>

                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> {{ $overview['items'] }} </h2>
                            <p class="text-muted mb-1">Artículos </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">Pedidos totales</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-start" dir="ltr">
                            <div class="flex-shrink-0 avatar-lg me-3">
                                <span class="avatar-title rounded-circle badge-soft-danger"><i class="mdi mdi-cart mdi-18px"></i> </span>
                            </div>
                        </div>

                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> {{ $overview['order'] }} </h2>
                            <p class="text-muted mb-1">Pedidos </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">Órdenes completadas</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-start" dir="ltr">
                            <div class="flex-shrink-0 avatar-lg me-3">
                                <span class="avatar-title rounded-circle badge-soft-warning"><i class="mdi mdi-calendar-check mdi-18px"></i> </span>
                            </div>
                        </div>

                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> {{ $overview['complete']  }} </h2>
                            <p class="text-muted mb-1">Órdenes </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">Pedidos de este mes</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-start" dir="ltr">
                            <div class="flex-shrink-0 avatar-lg me-3">
                                <span class="avatar-title rounded-circle badge-soft-info"><i class="mdi mdi-cart mdi-18px"></i> </span>
                            </div>
                        </div>

                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> {{ $overview['month']  }} </h2>
                            <p class="text-muted mb-1">Pedidos </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

    </div>