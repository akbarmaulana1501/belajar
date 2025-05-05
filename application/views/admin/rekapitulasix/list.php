<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('templates/') ?>javascript: void(0);">Admin</a></li>
                    <li class="breadcrumb-item active">Rekapitulasi</li>
                </ol>
            </div>
            <!-- <h4 class="page-title">Seelamat datang <?= $this->App->aplikasi()['nama']; echo ' anda login sebagai ' .$this->App->aplikasi()['role'];?> ! </h4>  -->
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-xl-12">

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body text-center mt-2 mb-2">
                        <h2>Dashboard Rekapitulasi Data Pegawai</h1> 
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Pegawai Unit Usaha</h4>
                    <p class="sub-header">

                    </p>

                    <div id="tooltipJumlahDataPegawai" style="display: none; position: absolute; z-index: 9999; border: 1px solid #fdd; padding: 2px; background-color: #fee; opacity: 0.8;"></div>

                    <div id="piechartJumlahDataPegawai" style="height: 400px;"></div>

                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Pegawai Berdasarkan Gender</h4>
                    <p class="sub-header text-truncate">

                    </p>

                    <div style="height: 700px">
                        <div class="text-center" style="margin-bottom: 20px">
                            <p class="text-uppercase mb-0">
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-info"></i> Laki - Laki</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-pink"></i> Perempuan</span>
                            </p>
                        </div>

                        <div id="chart" class="morris-chart" style="height: 650px; padding-bottom: 120px"></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Distributed series</h4>
                    <p class="sub-header text-truncate">
                        Sometime it's desired to have bar charts that show one bar per series
                        distributed along the x-axis. If this option is enabled, you need to
                        make sure that you pass a single series array to Chartist that contains the series values.
                    </p>

                    <div dir="ltr">
                        <div id="distributed-series" class="ct-chart ct-golden-section"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php $this->load->view('templates/includes/footer') ?>


    <!-- flot pie chart pegawai unit usaha -->
    <script type="text/javascript">

        $(document).ready(function() {

            $.ajax({
                url: '<?php echo base_url('rekapitulasi/chartUnitUsaha'); ?>',
                method: 'GET',
                dataType: 'json',
                success: function(data) {

                    var pegawai_per_unit = [];

                    for (var i = 0; i < data.length; i++) {
                        pegawai_per_unit.push({
                            label: data[i].nm_unit_usaha,
                            data: parseInt(data[i]['COUNT(*)'])
                        });
                    }

                    var options = {
                        series: {
                            pie: {
                                show: true
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        },
                        legend: {
                            position: "ne",
                            // container: $("#legend-container"),
                            labelFormatter: function(label, series) {
                                return label + " : " + series.data[0][1] + " Pegawai - " + Math.round(series.percent) + "%";
                            }
                        },

                        tooltip: {
                            show: false,
                            content: '%p.0%, %s',
                            // offset: 10,
                            css: {
                                top: '10px',
                                left: '10px',
                                'background-color': 'rgba(255,255,255,0.8)',
                                'border': '1px solid #ccc',
                                'padding': '5px'
                            }
                        }

                    };

                    var plot = $.plot("#piechartJumlahDataPegawai", pegawai_per_unit, options);

                    $("#piechartJumlahDataPegawai").bind("plothover", function(event, pos, item) {
                        if (item) {
                            var tooltipText = item.series.label + " : " + item.series.data[0][1] + " Pegawai - " + item.series.percent.toFixed(2) + "%";
                            $("#tooltipJumlahDataPegawai").html(tooltipText)
                            .css({top: pos.pageY - 270, left: pos.pageX - 250})
                            .fadeIn(200);
                        } else {
                            $("#tooltipJumlahDataPegawai").hide();
                        }
                    });

                }
            });
        });

    </script>


    <!-- morris bar chart pegawai gender  -->
    <script type="text/javascript">

        $(document).ready(function() {

            $.ajax({
                url: "<?php echo base_url('rekapitulasi/chartUnitUsahaPerGender'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var chartData = [];

                    // Loop through hasil query dan tambahkan ke dalam chartData
                    for (var i = 0; i < data.length; i++) {
                        if (chartData.length == 0 || chartData[chartData.length - 1].nm_unit_usaha != data[i].nm_unit_usaha) {
                            chartData.push({
                                nm_unit_usaha: data[i].nm_unit_usaha,
                                'Pria': data[i].jenis_kelamin == 'Pria' ? data[i]['COUNT(pegawai.jenis_kelamin)'] : 0,
                                'Wanita': data[i].jenis_kelamin == 'Wanita' ? data[i]['COUNT(pegawai.jenis_kelamin)'] : 0
                            });
                        } else {
                            // chartData[chartData.length - 1]['Pria'] += data[i].jenis_kelamin == 'Pria' ? data[i]['COUNT(pegawai.jenis_kelamin)'] : 0;
                            chartData[chartData.length - 1]['Wanita'] += data[i].jenis_kelamin == 'Wanita' ? data[i]['COUNT(pegawai.jenis_kelamin)'] : 0;
                        }
                    }

                    config = {
                        data: chartData,
                        xkey: 'nm_unit_usaha',
                        ykeys: ['Pria', 'Wanita'],
                        labels: ['Laki-laki', 'Perempuan'],
                        fillOpacity: 0.6,
                        hideHover: 'auto',
                        behaveLikeLine: true,
                        resize: true,
                        redraw: true,
                        pointFillColors:['#ffffff'],
                        pointStrokeColors: ['black'],
                        lineColors:['gray','red'],
                        barColors: ['#2890ff', '#FF69B4'],
                        // ymax: 500,
                        barSize: 30,
                        xLabelAngle: -70
                    };
                    config.element = 'chart';
                    Morris.Bar(config);

                },
                error: function() {
                    alert('Error: Incorrect contents fetched, please reload.');
                }
            });

        });
    </script>

    <!-- Chartis bar chart gender pegawai -->
    <!-- <script type="text/javascript">
        $(document).ready(function() {

            // new Chartist.Bar('.barChartByGenderUnitUsaha', {
            //     labels: [],
            //     series: []
            // }, {
            //     seriesBarDistance: 10,
            //     axisX: {
            //         offset: 60
            //     },
            //     axisY: {
            //         offset: 80,
            //         labelInterpolationFnc: function(value) {
            //             return value + ' Pegawai'
            //         },
            //         scaleMinSpace: 15
            //     },
            //     plugins: [
            //     Chartist.plugins.tooltip()
            //     ]
            // });

            $.ajax({
                url: '<?= base_url("rekapitulasi/chartUnitUsahaPerGender") ?>',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var labels = [];
                    var series_laki_laki = [];
                    var series_perempuan = [];

                    $.each(data, function(index, item) {
                        var nm_unit_usaha = nm.id_unit_usaha;
                        var jenis_kelamin = item.jenis_kelamin;
                        var jumlah = item['COUNT(*)'];

                        if ($.inArray(nm_unit_usaha, labels) == -1) {
                            labels.push(id_unit_usaha);
                            series_laki_laki.push(0);
                            series_perempuan.push(0);
                        }

                        var i = labels.indexOf(nm_unit_usaha);

                        if (jenis_kelamin == 'Laki-laki') {
                            series_laki_laki[i] = jumlah;
                        } else if (jenis_kelamin == 'Perempuan') {
                            series_perempuan[i] = jumlah;
                        }
                    });

                    var chartData = {
                        labels: labels,
                        series: [
                        series_laki_laki,
                        series_perempuan
                        ]
                    };

                    new Chartist.Bar('#barChartByGenderUnitUsaha', chartData, {
                        seriesBarDistance: 10,
                        axisX: {
                            offset: 60
                        },
                        axisY: {
                            offset: 80,
                            labelInterpolationFnc: function(value) {
                                return value + ' Pegawai'
                            },
                            scaleMinSpace: 15
                        },
                        plugins: [
                        Chartist.plugins.tooltip()
                        ]
                    });
                }
            });


            // Load chart data using Ajax
            // $.ajax({
            //   url: "<?php echo base_url('rekapitulasi/chartUnitUsahaPerGender'); ?>",
            //   type: "GET",
            //   dataType: "json",
            //   success: function(data) {
            //     var chartData = {
            //       labels: data.labels,
            //       series: [data.series]
            //   };

            //         // Create tooltip options
            //         var tooltipOptions = {
            //           content: function(label, value) {
            //             return label + ': ' + value + ' CHF';
            //         }
            //     };

            //                     // Draw the chart with tooltip
            //                     var chart = new Chartist.Bar('.barChartByGenderUnitUsaha', chartData, {
            //                       seriesBarDistance: 10,
            //                       axisX: {
            //                         labelOffset: {
            //                           x: -15,
            //                           y: 0
            //                       }
            //                   },
            //                   axisY: {
            //                     offset: 80,
            //                     labelInterpolationFnc: function(value) {
            //                       return value + ' CHF';
            //                   },
            //                   scaleMinSpace: 15
            //               }
            //           });

            //         // Add tooltip plugin after chart is created
            //         chart.on('created', function() {
            //           chart.container.addEventListener('mouseover', function(event) {
            //             if (event.target.classList.contains('ct-bar')) {
            //               var tooltipLabel = event.target.getAttribute('ct:meta');
            //               var tooltipValue = event.target.getAttribute('ct:value');
            //               Chartist.plugins.tooltip(tooltipOptions).show({
            //                 value: tooltipValue,
            //                 meta: tooltipLabel
            //             }, event);
            //           }
            //       });
            //           chart.container.addEventListener('mouseout', function() {
            //             Chartist.plugins.tooltip(tooltipOptions).hide();
            //         });
            //       });
            //     },
            //     error: function(jqXHR, textStatus, errorThrown) {
            //         console.log("Error loading chart data: " + errorThrown);
            //     }
            // });



            // new Chartist.Bar('.ct-chart', {
            //     labels: ['First quarter of the year', 'Second quarter of the year', 'Third quarter of the year', 'Fourth quarter of the year'],
            //     series: [
            //     [60000, 40000, 80000, 70000],
            //     [40000, 30000, 70000, 65000],
            //     [8000, 3000, 10000, 6000]
            //     ]
            // }, {
            //     seriesBarDistance: 10,
            //     axisX: {
            //         offset: 60
            //     },
            //     axisY: {
            //         offset: 80,
            //         labelInterpolationFnc: function(value) {
            //             return value + ' CHF'
            //         },
            //         scaleMinSpace: 15
            //     }
            // });

        });

    </script> -->

    <!-- bar chart -->

    <!-- <script type="text/javascript">

        $(document).ready(function () {

            //stacked bar chart

            // Data untuk grafik
            var data = [
            { label: "Pria", data: [[0, 15], [1, 25], [2, 30], [3, 20], [4, 10]] },
            { label: "Wanita", data: [[0, 10], [1, 15], [2, 25], [3, 35], [4, 15]] }
            ];

            // Objek pengaturan (options) untuk grafik
            var options = {
                series: {
                    stack: true,
                    stacktooltip: {
                        show: true,
                        content: function(label, x, y) {
                            return label + ": " + y;
                        }
                    },
                    bars: {
                        show: true,
                        barWidth: 0.6,
                        align: "center"
                    }
                },
                legend: {
                    position: "nw",
                    container: $("#bar-chart-legend")
                },
                xaxis: {
                    ticks: [[0, "Jan"], [1, "Feb"], [2, "Mar"], [3, "Apr"], [4, "May"]],
                    tickLength: 0
                },
                yaxis: {
                    tickLength: 0
                },
                grid: {
                    borderWidth: 0,
                    hoverable: true
                },
                colors: ["#1abc9c", "#3498db"]
            };

            // Menampilkan grafik Stacked Bar Chart dengan Flot Chart
            $.plot($("#stacked-bar-chart"), data, options);

        }); 

    </script> -->

</body>
</html>