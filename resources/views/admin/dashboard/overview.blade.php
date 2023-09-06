<div class="row">

    <div class="col d-lg-block d-none m-b-30">
        <div class="card">
            <div class=" text-left card-body">
                <h4 class="header-title mt-0 mb-4">Negocios</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <div class="flex-shrink-0 avatar-lg me-3">
                            <span class="avatar-title rounded-circle badge-soft-success">
                                <i class="mdi mdi-home mdi-18px"></i>
                        </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $overview['store'] }} </h2>
                        <p class="text-muted mb-1">Negocios </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col d-lg-block d-none m-b-30">
        <div class="card">
            <div class="text-left card-body">
                <h4 class="header-title mt-0 mb-4">Total de Reservas</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <div class="flex-shrink-0 avatar-lg me-3">
                            <span class="avatar-title rounded-circle badge-soft-danger"><i class="mdi mdi-book mdi-18px"></i> </span>
                        </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $overview['reservas'] }} </h2>
                        <p class="text-muted mb-1">Reservas </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col d-lg-block d-none m-b-30">
        <div class="card">
            <div class="text-left card-body">
                <h4 class="header-title mt-0 mb-4">Tickets Aceptados</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <div class="flex-shrink-0 avatar-lg me-3">
                            <span class="avatar-title rounded-circle badge-soft-warning"><i class="mdi mdi-calendar-check mdi-18px"></i> </span>
                        </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $overview['ticket_complete']  }} </h2>
                        <p class="text-muted mb-1">Tickets </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

    <div class="col d-lg-block d-none m-b-30">
        <div class="card">
            <div class="text-left card-body">
                <h4 class="header-title mt-0 mb-4">Usuarios Registrados</h4>

                <div class="widget-chart-1">
                    <div class="widget-chart-box-1 float-start" dir="ltr">
                        <div class="flex-shrink-0 avatar-lg me-3">
                            <span class="avatar-title rounded-circle badge-soft-info"><i class="mdi mdi-account mdi-18px"></i> </span>
                        </div>
                    </div>

                    <div class="widget-detail-1 text-end">
                        <h2 class="fw-normal pt-2 mb-1"> {{ $overview['user']  }} </h2>
                        <p class="text-muted mb-1">Usuarios </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col -->

</div>