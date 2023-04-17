<style>
    #chart-01 {
  max-width: 550px;
  margin: 35px auto;
}

</style>
<div class="row">
    <div class="col-lg-12  m-b-30">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Informe de pedido de los últimos 6 meses</div>

                <div class="card-controls">

                    <a href="#" class="js-card-refresh icon"> </a>

                </div>

            </div>
            <div class="card-body">
                <div id="chart-01" ></div>
            </div>
            <div class="">
            </div>
            <div class="card-footer">
                <div class="d-flex  justify-content-between">
                    <h6 class="m-b-0 my-auto"><span class="opacity-75"> <i class="mdi mdi-information"></i>Quiere ver
                            más datos</span>
                    </h6>
                    <a href="report" class="btn btn-white shadow-none">Obtenga el informe completo</a>
                </div>
            </div>


        </div>
    </div>
</div>

@section('js')
    <script type="text/javascript">
        (function($) {
            'use strict';

            if ($("#chart-01").length) {

                var options = {
                    colors: colors,
                    chart: {

                        type: 'bar',
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            endingShape: 'rounded',
                            columnWidth: '55%',
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    series: [{
                            name: 'Cancelled Orders',
                            data: [<?php echo $admin->chart(6, 1)['cancel']; ?>, <?php echo $admin->chart(5, 1)['cancel']; ?>, <?php echo $admin->chart(4, 1)['cancel']; ?>,
                                <?php echo $admin->chart(3, 1)['cancel']; ?>, <?php echo $admin->chart(2, 1)['cancel']; ?>, <?php echo $admin->chart(1, 1)['cancel']; ?>,
                                <?php echo $admin->chart(0, 1)['cancel']; ?>
                            ]
                        },
                        {
                            name: 'Completed Orders',
                            data: [<?php echo $admin->chart(6, 1)['order']; ?>, <?php echo $admin->chart(5, 1)['order']; ?>, <?php echo $admin->chart(4, 1)['order']; ?>,
                                <?php echo $admin->chart(3, 1)['order']; ?>, <?php echo $admin->chart(2, 1)['order']; ?>, <?php echo $admin->chart(1, 1)['order']; ?>,
                                <?php echo $admin->chart(0, 1)['order']; ?>
                            ]
                        },




                    ],
                    xaxis: {
                        categories: ['<?php echo $admin->getMonthName(6); ?>', '<?php echo $admin->getMonthName(5); ?>', '<?php echo $admin->getMonthName(4); ?>',
                            '<?php echo $admin->getMonthName(3); ?>', '<?php echo $admin->getMonthName(2); ?>', '<?php echo $admin->getMonthName(1); ?>',
                            '<?php echo $admin->getMonthName(0); ?>'
                        ],
                    },
                    yaxis: {
                        title: {
                            text: ''
                        }
                    },
                    fill: {
                        opacity: 1

                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val
                            }
                        }
                    }
                }

                var chart = new ApexCharts(
                    document.querySelector("#chart-01"),
                    options
                );

                chart.render();
            }


        })(window.jQuery);
        console.log(chart);
    </script>
@endsection
