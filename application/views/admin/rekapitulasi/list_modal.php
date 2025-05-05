<script type="text/javascript">

    FlotChart.prototype.init = function() {
        var pielabels = ["Series 1", "Series 2", "Series 3", "Series 4"];
        var datas = [20, 30, 15, 32];
        var colors = ['#348cd4', '#45bbe0','#1ea69a','#8892d6'];
        this.createPieGraph("#pie-chart #pie-chart-container", pielabels, datas, colors);
    }

    FlotChart.prototype.createPieGraph = function(selector, labels, datas, colors) {
        var data = [{
            label : labels[0],
            data : datas[0]
        }, {
            label : labels[1],
            data : datas[1]
        }, {
            label : labels[2],
            data : datas[2]
        },{
            label : labels[3],
            data : datas[3]
        }];
        var options = {
            series : {
                pie : {
                    show : true
                }
            },
            legend : {
                show : true
            },
            grid : {
                hoverable : true,
                clickable : true
            },
            colors : colors,
            tooltip : true,
            tooltipOpts : {
                content : "%s, %p.0%"
            }
        };

        $.plot($(selector), data, options);
    }

    //init flotchart
    $.FlotChart = new FlotChart, $.FlotChart.Constructor =
    FlotChart

</script>

<script type="text/javascript">

    $data = [
    ['month' => 'January', 'sales' => 12000],
    ['month' => 'February', 'sales' => 19000],
    ['month' => 'March', 'sales' => 3000],
    ['month' => 'April', 'sales' => 5000],
    ['month' => 'May', 'sales' => 2000],
    ['month' => 'June', 'sales' => 3000],
    ['month' => 'July', 'sales' => 8000]
    ];  

    $labels = [];
    $sales = [];

    foreach ($data as $item) {
      $labels[] = $item['month'];
      $sales[] = $item['sales'];
  }

  $data_chart = [
  'labels' => $labels,
  'datasets' => [
  [
  'label' => 'Sales',
  'data' => $sales,
  'backgroundColor' => [
  'rgba(255, 99, 132, 0.2)',
  'rgba(54, 162, 235, 0.2)',
  'rgba(255, 206, 86, 0.2)',
  'rgba(75, 192, 192, 0.2)',
  'rgba(153, 102, 255, 0.2)',
  'rgba(255, 159, 64, 0.2)',
  'rgba(255, 99, 132, 0.2)'
  ],
  'borderColor' => [
  'rgba(255, 99, 132, 1)',
  'rgba(54, 162, 235, 1)',
  'rgba(255, 206, 86, 1)',
  'rgba(75, 192, 192, 1)',
  'rgba(153, 102, 255, 1)',
  'rgba(255, 159, 64, 1)',
  'rgba(255, 99, 132, 1)'
  ],
  'borderWidth' => 1
  ]
  ]
  ];

  var ctx = document.getElementById('myChart').getContext('2d');
  var data_chart = <?php echo json_encode($data_chart); ?>;
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: data_chart,
      options: {
        scales: {
          y: {
            beginAtZero: true
        }
    }
}
});
</script>   

<script type="text/javascript">
    const data = {
        labels: ['Red', 'Blue', 'Yellow'],
        datasets: [
        {
            label: 'My First Dataset',
            data: [300, 50, 100],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
            hoverOffset: 4
        }
        ]
    };

            // Buat chart
            const ctx = document.getElementById('ini').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'My Pie Chart'
                        }
                    }
                },
            });
        </script>    

        <script type="text/javascript">
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                  label: 'Sales',
                  data: [12, 19, 3, 5, 2, 3, 8],
                  backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 99, 132, 0.2)'
                  ],
                  borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
                  'rgba(255, 99, 132, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<script type="text/javascript">
      //pie flotchart

      var options = {
        series: {
            pie: {
                show: false,
                radius: "auto", // actual radius of the visible pie (based on full calculated radius if <=1, or hard pixel value)
                innerRadius: 0, /* for donut */
                startAngle: 3/2,
                tilt: 1,
                shadow: {
                    left: 5,    // shadow left offset
                    top: 15,    // shadow top offset
                    alpha: 0.02 // shadow alpha
                },
                offset: {
                    top: 0,
                    left: "auto"
                },
                stroke: {
                    color: "#fff",
                    width: 1
                },
                label: {
                    show: "auto",
                    formatter: function(label, slice) {
                        return "<div style='font-size:x-small;text-align:center;padding:2px;color:" + slice.color + ";'>" + label + "<br/>" + Math.round(slice.percent) + "%</div>";
                    },  // formatter function
                    radius: 1,  // radius at which to place the labels (based on full calculated radius if <=1, or hard pixel value)
                    background: {
                        color: null,
                        opacity: 0
                    },
                    threshold: 0    // percentage at which to hide the label (i.e. the slice is too narrow)
                },
                combine: {
                    threshold: -1,  // percentage at which to combine little slices into one larger slice
                    color: null,    // color to give the new slice (auto-generated if null)
                    label: "Other"  // label to give the new slice
                },
                highlight: {
                    //color: "#fff",        // will add this functionality once parseColor is available
                    opacity: 0.5
                }
            }
        }
    };

</script>

<script type="text/javascript">
      // $.plot('#placeholder', data, {
            //     series: {
            //         pie: {
            //             show: true
            //         }
            //     },
            //     grid: {
            //         hoverable: true,
            //         clickable: true
            //     }
            // });

            // $.plot('#placeholder', data).plugins.push({
            //         init: init,
            //         options: options,
            //         name: "pie",
            //         version: "1.1"
            //     });
        </script>

        <!--flot stack chart -->
  <!-- <script>
    $('#flotStackChart').plot(
      [
        { color: 'orange', 
          data: [[0, 3], [1, 4], [2, 2]] },
        { color: 'lightblue', 
          data: [[0, 6], [1, 3], [2, 6]] },
        { color: 'darkred', 
          data: [[0, 1], [1, 3], [2, 2]] }
      ], 
      { 
        series: { 
          stack: true, 
          bars: {
            show: true,
            barWidth: 0.2, align: 'center'
          }
        } 
      }
    );
</script> -->

    <!-- <script type="text/javascript">
        var stack_ticks = {
            y: {
                axisLabel: "Sales Value (USD)",
                tickColor: '#f5f5f5',
                font: {
                    color: '#bdbdbd'
                }
            },
            x: {
                axisLabel: "Last 10 Days",
                tickColor: '#f5f5f5',
                font: {
                    color: '#bdbdbd'
                }
            }
        };

        //random data
        var d1 = [];
        for (var i = 0; i <= 10; i += 1)
            d1.push([i, parseInt(Math.random() * 30)]);

        var d2 = [];
        for (var i = 0; i <= 10; i += 1)
            d2.push([i, parseInt(Math.random() * 30)]);

        var d3 = [];
        for (var i = 0; i <= 10; i += 1)
            d3.push([i, parseInt(Math.random() * 30)]);

        var ds = new Array();

        ds.push({
            label: "Series One",
            data: d1,
            bars: {
                order: 3
            }
        });
        ds.push({
            label: "Series Two",
            data: d2,
            bars: {
                order: 2
            }
        });
        ds.push({
            label: "Series Three",
            data: d3,
            bars: {
                order: 1
            }
        });
        this.createStackBarGraph("#ordered-bars-chart", stack_ticks, ['#348cd4', '#45bbe0', "#ebeff2"], ds);
    </script> -->


    <!-- <script type="text/javascript">

            var dataSet = [
                {label: "Asia", data: 4119630000, color: "#005CDE" },
                { label: "Latin America", data: 590950000, color: "#00A36A" },
                { label: "Africa", data: 1012960000, color: "#7D0096" },
                { label: "Oceania", data: 35100000, color: "#992B00" },
                { label: "Europe", data: 727080000, color: "#DE000F" },
                { label: "North America", data: 344120000, color: "#ED7B00" }    
            ];

            series: {
                pie: {
                    show: true,                
                    label: {
                        show:true,
                        radius: 0.8,
                        formatter: function (label, series) {                
                            return '<div style="border:1px solid grey;font-size:8pt;text-align:center;padding:5px;color:white;">' +
                                label + ' : ' +
                                Math.round(series.percent) +
                            '%</div>';
                        },
                        background: {
                            opacity: 0.8,
                            color: '#000'
                        }
                    }
                }
            }

            $.fn.showMemo = function () {
                $(this).bind("plothover", function (event, pos, item) {
                    if (!item) { return; }
 
                    var html = [];
                    var percent = parseFloat(item.series.percent).toFixed(2);        
 
                    html.push("<div style=\"border:1px solid grey;background-color:",
                         item.series.color,
                         "\">",
                         "<span style=\"color:white\">",
                         item.series.label,
                         " : ",
                         $.formatNumber(item.series.data[0][1], { format: "#,###", locale: "us" }),
                         " (", percent, "%)",
                         "</span>", 
                        "</div>");
                    $("#flot-memo").html(html.join(''));
                });
            }

            $(document).ready(function () {
                $.plot($("#flot-placeholder"), dataSet, options);
                $("#flot-placeholder").showMemo();
            });            

        </script>  -->