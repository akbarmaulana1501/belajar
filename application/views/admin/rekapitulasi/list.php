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

				<div class="card card-border">
					<div class="card-header border-primary pb-0">
					</div>
					<div class="card-body text-center mt-2 mb-2">
						<h2>Dashboard Rekapitulasi Data Pegawai</h1> 
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>

	<div class="row">

		<!-- Flot Pie Chart Pegawai Unit Usaha -->
		<div class="col-xl-12">
			<div class="card">
				<div class="card-header bg-info">
					<h4 class="card-title text-white mb-0">Pegawai Unit Usaha</h4>
				</div>
				<div class="card-body">

					<div id="tooltipJumlahDataPegawai" style="display: none; position: absolute; z-index: 9999; border: 1px solid #fdd; padding: 2px; background-color: #fee; opacity: 1; font-weight: bold;"></div>

					<div style="width: 1250px">

						<div id="piechartJumlahDataPegawai" style="height: 550px;"></div>

                        <!-- <div class="row">

                            <div class="col-xl-7" id="piechartJumlahDataPegawai" style="height: 550px;"></div>

                            <div class="col-xl-5">
                                <div id="legend-container"></div>
                            </div>

                        </div> -->

                    </div>

                </div>
            </div>
        </div>

        <!-- Morris Bar Chart Pegawai Per Tahun -->
        <div class="col-xl-12">

        	<div class="card">
        		<div class="card-header bg-info">
        			<h4 class="card-title text-white mb-0">Pegawai Per Tahun</h4>
        		</div>
        		<div class="card-body">

        			<div style="height: 700px;">
        				<div class="text-center">
        					<p class="text-uppercase mb-0">
        						<span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-info"></i> Pegawai Baru</span>
        						<span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-pink"></i> Total Pegawai</span>
        					</p>
        				</div>

        				<div id="chart_pegawai_per_tahun" class="morris-chart" style="height: 650px;"></div>

        			</div>
        		</div>
        	</div>
        </div>

        <!-- Morris Bar Chart Pegawai Gender -->
        <div class="col-xl-12">
        	<div class="card">
        		<div class="card-header bg-info">
        			<h4 class="card-title text-white mb-0">Pegawai Gender</h4>
        		</div>
        		<div class="card-body">

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

        <!-- Morris Bar Chart Pegawai Pendidikan Terakhir -->
        <div class="col-xl-6">
        	<div class="card">
        		<div class="card-header bg-info">
        			<h4 class="card-title text-white mb-0">Pegawai Pendidikan Terakhir</h4>
        		</div>
        		<div class="card-body" style="height: 700px">

        			<div class="row">

        				<div class="col-xl-12">

        					<div id="chart-pendidikan-pegawai" class="morris-chart" style="height: 650px"></div>

        				</div>

        				<!-- Morris Donut Chart Pegawai Pendidikan Terakhir -->
        				<!-- <div class="col-xl-6">


        					<div id="donut_chart_pendidikan" class="morris-chart"></div>

                            <div class="text-center">
                                <p class="text-uppercase mb-0">
                                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-muted"></i> Financial</span>
                                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-info"></i> Markets</span>
                                    <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-success"></i> Electricity</span>
                                </p>
                            </div>

                        </div> -->

                    </div>

                </div>
            </div>
        </div>

        <!-- Morris Donut Chart Pegawai Agama -->
        <div class="col-xl-6">

        	<div class="card">
        		<div class="card-header bg-info">
        			<h4 class="card-title text-white mb-0">Pegawai Agama</h4>
        		</div>
        		<div class="card-body"  style="height: 700px">

        			<div id="donut_chart_agama" class="morris-chart" style="height: 450px; margin-top: 50px;margin-bottom: 50px"></div>

        			<div class="text-center">
        				<p class="text-uppercase mb-0">
        					<span class="mx-2" style="font-size: 14pt"><i class="mdi mdi-checkbox-blank-circle" style="color: #b2ff66; font-size: 14pt"></i> Islam</span>
        					<span class="mx-2" style="font-size: 14pt"><i class="mdi mdi-checkbox-blank-circle" style="color: #66ffb2; font-size: 14pt"></i> Kristen Katolik</span>
        					<span class="mx-2" style="font-size: 14pt"><i class="mdi mdi-checkbox-blank-circle" style="color: #66ffff; font-size: 14pt"></i> Kristen Protestan</span>
        					<span class="mx-2" style="font-size: 14pt"><i class="mdi mdi-checkbox-blank-circle" style="color: #ffb266; font-size: 14pt"></i> Budha</span>
        					<span class="mx-2" style="font-size: 14pt"><i class="mdi mdi-checkbox-blank-circle" style="color: #ffff66; font-size: 14pt"></i> Hindu</span>
        				</p>
        			</div>

        		</div>
        	</div>

        </div>

        <!-- <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Pie Chart</h4>
                    <p class="sub-header">
                        Display as Pie Chart.
                    </p>
                    
                    <div id="pie-chart" dir="ltr"></div>
                </div>
            </div>
        </div> -->

        <!-- <div class="col-xl-12">
        	<div class="card">
        		<div class="card-body">
        			<h4 class="header-title">Pie Chart</h4>
        			<p class="sub-header">
        				Display as Pie Chart.
        			</p>

        			<div id="pie_pegawai" style="height: 650px;"></div>
        		</div>
        	</div>
        </div> -->

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
                                // label: {
                                //     show: true,
                                //     radius: 3/4,                        
                                //     formatter: function(label, series) {
                                //       return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
                                //   },
                            }
                        },
                        grid: {
                        	hoverable: true,
                        	clickable: true
                        },
                        legend: {
                        	show: true,
                        	position: "ne",
                        	margin: [10, 50],
                            // container: $("#legend-container"),
                            labelFormatter: function(label, series) {
                            	return label + " : " + series.data[0][1] + " Pegawai - " + Math.round(series.percent) + "%";
                            }
                        },

                        // tooltip: {
                        //     show: true,
                        //     content: '%p.0%, %s',
                        //     defaultTheme: false,
                        //     // offset: 10,
                        //     css: {
                        //         top: '10px',
                        //         left: '10px',
                        //         'background-color': 'rgba(255,255,255,0.8)',
                        //         'border': '1px solid #ccc',
                        //         'padding': '5px'
                        //     }
                        // }

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

    <!-- morris chart pegawai per tahun -->
    <script type="text/javascript">
    	
    	// $(document).ready(function(){
    	// 	$.ajax({
    	// 		url: '<?php echo base_url('rekapitulasi/chartPegawaiPerTahun'); ?>',
    	// 		dataType: 'json',
    	// 		success: function(data){

    	// 			var chartData = [];
    	// 			for (var i = 0; i < data.length; i++) {
    	// 				chartData.push({
    	// 					tanggal_diangkat: data[i].tanggal_diangkat,
    	// 					jumlah_pegawai: data[i].jumlah_pegawai
    	// 				});
    	// 			}

     //  				// Generate chart
     //  				new Morris.Line({
     //  					element: 'chart_pegawai_per_tahun',
     //  					data: chartData,
     //  					xkey: 'tanggal_diangkat',
     //  					ykeys: ['jumlah_pegawai'],
     //  					labels: ['Jumlah Pegawai'],
     //  					lineColors: ['#5bc0de'],
     //  					lineWidth: 2,
     //  					hideHover: 'auto',
     //  					resize: true
     //  				});
     //  			},
     //  			error: function(err){
     //  				console.log(err);
     //  			}
     //  		});
    	// });

    	$(document).ready(function() {
    		$.ajax({
    			url: '<?php echo base_url('rekapitulasi/chartPegawaiPerTahun'); ?>',
    			dataType: 'json',
    			success: function(data) {

    				var chartData = [];
    				var prevValue = 0; 
    				var jumlah = 0;
    				for (var i = 0; i < data.length; i++) {
    					// var currValue = data[i].jumlah_pegawai;
    					var currValue = parseInt(data[i].jumlah_pegawai);
    					var diff = currValue + prevValue;
    					jumlah = jumlah + currValue;
    					chartData.push({
    						tanggal_diangkat: data[i].tanggal_diangkat,
    						jumlah_pegawai: currValue,
    						hasil: jumlah
    					});
    					prevValue = currValue; 
    				}

      				// Generate chart
      				new Morris.Line({
      					element: 'chart_pegawai_per_tahun',
      					data: chartData,
      					xkey: 'tanggal_diangkat',
      					ykeys: ['jumlah_pegawai', 'hasil'], 
      					labels: ['Pegawai Baru', 'Total Pegawai'],
      					lineColors: ['#5bc0de', '#d9534f'],
      					lineWidth: 2,
      					hideHover: 'auto',
      					resize: true
      				});
      			},
      			error: function(err) {
      				console.log(err);
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
                        xLabelAngle: 70
                    };
                    config.element = 'chart';
                    Morris.Bar(config);

                },
                error: function(jqXHR, textStatus, errorThrown) {
                	console.log(textStatus, errorThrown);
                }
            });

    	});
    </script>


    <!-- morris bar chart pegawai pendidikan -->
    <script type="text/javascript">

    	$(document).ready(function() {

            // fungsi untuk mengambil warna acak
            function randomColor() {
            	var letters = "0123456789ABCDEF";
            	var color = "#";
            	for (var i = 0; i < 6; i++) {
            		color += letters[Math.floor(Math.random() * 16)];
            	}
            	return color;
            }

            // Mengambil data JSON dari controller
            $.ajax({
            	url: "<?php echo base_url('rekapitulasi/chartPendidikanPegawai'); ?>",
            	type: "GET",
            	dataType: "json",
            	success: function(data) {
                    // Mengatur data yang akan ditampilkan pada chart
                    var chartData = [];
                    for (var i = 0; i < data.length; i++) {
                    	chartData.push({
                    		pendidikan: data[i].pend_terakhir,
                    		jumlah_pegawai: data[i].jumlah_pegawai
                    	});
                    }

                    // buat array warna acak
                    var colors = [];
                    for (var i = 0; i < data.length; i++) {
                    	colors.push(randomColor());
                    }

                    // Mengatur Morris Bar Chart
                    // Morris.Bar({
                    //     element: 'chart-pendidikan-pegawai',
                    //     data: chartData,
                    //     xkey: 'pendidikan',
                    //     ykeys: ['jumlah_pegawai'],
                    //     labels: ['Jumlah Pegawai'],
                    //     hideHover: 'auto',
                    //     resize: true
                    // });

                    var chart = Morris.Bar({
                    	element: 'chart-pendidikan-pegawai',
                    	data: chartData,
                    	xkey: 'pendidikan',
                    	ykeys: ['jumlah_pegawai'],
                    	labels: ['Jumlah Pegawai'],
                        // barColors: ['#1E90FF'],
                        // barColors: colors,
                        barColors: function (row, series, type) {
                            // var colors = ['#F44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#03A9F4', '#00BCD4', '#009688', '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722'];
                            // return colors[row.label.length % colors.length];

                            // var colors = ['#F44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#00BCD4', '#009688', '#4CAF50', '#8BC34A'];

                            var colors = ['#ff6666', '#ffb266', '#ffff66', '#b2ff66', '#66ff66', '#66ffb2', '#66ffff', '#66b2ff', '#6666ff', '#b266ff', '#ff66ff', '#ff66b2', '#ff9999', '#ffd699', '#ffff99'];

                            return colors[row.x % colors.length];
                        },
                        resize: true,
                        hideHover: 'auto',
                        xLabelAngle: 60,
                        horizontal: false
                    });

                },
                error: function(xhr, status, error) {
                	console.error(error);
                }
            });
        });

    </script>

    <!-- morris donut chart pegawai pendidikan -->
    <!-- <script type="text/javascript">

    	$(document).ready(function() {

    		$.ajax({
    			url: "<?php echo base_url('rekapitulasi/chartDonutPendidikanPegawai'); ?>",
    			type: "GET",
    			dataType: "json",
    			success: function(data) {
    				Morris.Donut({
    					element: 'donut_chart_pendidikan',
    					data: data,
    					resize: true,
    					colors: ['#ff6666', '#ffb266', '#ffff66', '#b2ff66', '#66ff66', '#66ffb2', '#66ffff', '#66b2ff', '#6666ff', '#b266ff', '#ff66ff', '#ff66b2', '#ff9999', '#ffd699', '#ffff99'],
                        // formatter: function (y, x) { return y + ' (' + Math.round(x.percentage) + '%)'; }
                        formatter: function (y, x) { return y + ' Pegawai'; }
                    });
    			},
    			error: function(jqXHR, textStatus, errorThrown) {
    				console.log(textStatus, errorThrown);
    			}
    		});

    	});

    </script> -->

    <!-- morris donut chart pegawai agama -->
    <script type="text/javascript">

    	$(document).ready(function() {

    		$.ajax({
    			url: "<?php echo base_url('rekapitulasi/chartDonutAgamaPegawai'); ?>",
    			type: "GET",
    			dataType: "json",
    			success: function(data) {
    				Morris.Donut({
    					element: 'donut_chart_agama',
    					data: data,
    					resize: true,
    					colors: ['#ff6666', '#ffb266', '#ffff66', '#b2ff66', '#66ff66', '#66ffb2', '#66ffff'],
                        // formatter: function (y, x) { return y + ' (' + Math.round(x.percentage) + '%)'; }
                        formatter: function (y, x) { return y + ' Pegawai'; }
                    });
    			},
    			error: function(jqXHR, textStatus, errorThrown) {
    				console.log(textStatus, errorThrown);
    			}
    		});

    	});

    </script>


    <!-- <script type="text/javascript">
    	
    	$(document).ready(function() {
    		$.ajax({
    			url: '<?php echo base_url('rekapitulasi/chartUnitUsaha'); ?>',
    			method: 'GET',
    			dataType: 'json',
    			success: function(data) {
    				var chartData = [];
    				for (var i = 0; i < data.length; i++) {
    					chartData.push([data[i].nm_unit_usaha, parseInt(data[i]['COUNT(*)'])]);
    				}
    				var chart = c3.generate({
    					bindto: '#pie_pegawai',
    					data: {
    						columns: chartData,
    						type: 'pie'
    					},
    					pie: {
    						label: {
    							format: function(value, ratio, id) {
    								return id + ': ' + value + ' (' + Math.round(ratio * 100) + '%)';
    							}
    						}
    					},
    					legend: {
    						show: true,
    						position: 'right',
    						item: {
    							onclick: function(id) {}
    						}
    					}
    				});
    			},
    			error: function(err) {
    				console.log(err);
    			}
    		});
    	});


    </script> -->

</body>
</html>