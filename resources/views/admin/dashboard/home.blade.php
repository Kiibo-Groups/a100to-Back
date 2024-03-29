@extends('admin.layout.main')

@section('title')
    Bienvenido(a) ! {{ Auth::guard('admin')->user()->name }}
@endsection

@section('icon')
    mdi-home
@endsection


@section('content')
    <div class="content-page" id="div2">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-12 mx-auto mt-2">

                        @include('admin.dashboard.overview')
                        @include('admin.dashboard.chart')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ Asset('assets/vendor/apexchart/apexcharts.min.js') }}"></script>

    <script type="text/javascript">
        (function($) {
            'use strict';

            if ($("#chart-01").length) {

                var options = {
                    colors: '#FF914D',
                    chart: {
                        type: 'area',
                        stacked: false,
                        zoom: {
                            type: 'x',
                            enabled: true,
                            autoScaleYaxis: true
                        },
                        toolbar: {
                            autoSelected: 'zoom'
                        }
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
                            name: 'Reservas Canceladas',
                            data: [
                                "<?php echo $admin->chart(6)['cancel']; ?>",
                                "<?php echo $admin->chart(5)['cancel']; ?>",
                                "<?php echo $admin->chart(4)['cancel']; ?>",
                                "<?php echo $admin->chart(3)['cancel']; ?>",
                                "<?php echo $admin->chart(2)['cancel']; ?>",
                                "<?php echo $admin->chart(1)['cancel']; ?>",
                                "<?php echo $admin->chart(0)['cancel']; ?>"
                            ]

                        },
                        {
                            name: 'Reservas Completas',
                            data: [
                                "<?php echo $admin->chart(6)['order']; ?>",
                                "<?php echo $admin->chart(5)['order']; ?>",
                                "<?php echo $admin->chart(4)['order']; ?>",
                                "<?php echo $admin->chart(3)['order']; ?>",
                                "<?php echo $admin->chart(2)['order']; ?>",
                                "<?php echo $admin->chart(1)['order']; ?>",
                                "<?php echo $admin->chart(0)['order']; ?>"
                            ]
                        },

                    ],
                    xaxis: {
                        categories: [
                            '<?php echo $admin->getMonthName(6); ?>',
                            '<?php echo $admin->getMonthName(5); ?>',
                            '<?php echo $admin->getMonthName(4); ?>',
                            '<?php echo $admin->getMonthName(3); ?>',
                            '<?php echo $admin->getMonthName(2); ?>',
                            '<?php echo $admin->getMonthName(1); ?>',
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

            if ($("#chart-02").length) {
                var options = {
                    chart: {

                        type: 'bar',
                    },
                    colors: '#FF914D',
                    plotOptions: {
                        bar: {
                            horizontal: true,
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    series: [{
                        data: [
                            "<?php echo $admin->getStoreData($schart, 0, 'order'); ?>",
                            "<?php echo $admin->getStoreData($schart, 1, 'order'); ?>",
                            "<?php echo $admin->getStoreData($schart, 2, 'order'); ?>",
                            "<?php echo $admin->getStoreData($schart, 3, 'order'); ?>",
                            "<?php echo $admin->getStoreData($schart, 4, 'order'); ?>",
                            "<?php echo $admin->getStoreData($schart, 5, 'order'); ?>",
                            "<?php echo $admin->getStoreData($schart, 6, 'order'); ?>",
                            "<?php echo $admin->getStoreData($schart, 7, 'order'); ?>",
                            "<?php echo $admin->getStoreData($schart, 8, 'order'); ?>",
                            "<?php echo $admin->getStoreData($schart, 9, 'order'); ?>"
                        ]
                    }],
                    xaxis: {
                        categories: [
                            "<?php echo $admin->getStoreData($schart, 0, 'name'); ?>",
                            "<?php echo $admin->getStoreData($schart, 1, 'name'); ?>",
                            "<?php echo $admin->getStoreData($schart, 2, 'name'); ?>",
                            "<?php echo $admin->getStoreData($schart, 3, 'name'); ?>",
                            "<?php echo $admin->getStoreData($schart, 4, 'name'); ?>",
                            "<?php echo $admin->getStoreData($schart, 5, 'name'); ?>",
                            "<?php echo $admin->getStoreData($schart, 6, 'name'); ?>",
                            "<?php echo $admin->getStoreData($schart, 7, 'name'); ?>",
                            "<?php echo $admin->getStoreData($schart, 8, 'name'); ?>",
                            "<?php echo $admin->getStoreData($schart, 9, 'name'); ?>"
                        ],
                    },
                    yaxis: {},
                    tooltip: {}
                };

                var chart = new ApexCharts(
                    document.querySelector("#chart-02"),
                    options
                );

                chart.render();

            }

        })(window.jQuery);
    </script>
@endsection
