<!--flot pie chart -->

    <!-- <script type="text/javascript">

        $(document).ready(function () {
        // pie chart

            // Buat objek data untuk grafik
            var data = [
            { label: "Series 1", data: 30 },
            { label: "Series 2", data: 50 },
            { label: "Series 3", data: 20 }
            ];

            // Buat objek pengaturan (options) untuk grafik
            var options = {
                colors: ["#1abc9c", "#3498db", "#9b59b6"],
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
                    position: "ne"
                }
            };

            // Panggil fungsi plot() dari library Flot Chart untuk menampilkan grafik
            $.plot('#placeholder', data, options);
        });

      </script> -->


      <script type="text/javascript">
        $(document).ready(function() {

          var data = [
          { label: "Series 1", data: 20 },
          { label: "Series 2", data: 30 },
          { label: "Series 2", data: 30 },
          { label: "Series 2", data: 30 },
          { label: "Series 3", data: 50 }
          ];

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
              labelFormatter: function(label, series) {
                return label + " - " + Math.round(series.percent) + "%";
              }
            },
            tooltip: {
              show: true,
              content: function(label, x, y, flotItem) {
                var dataValue = flotItem.datapoint[1];
                return label + " - " + Math.round(dataValue) + "%";
              }
            }
          };

          var plot = $.plot("#piechart", data, options);

          $("#piechart").bind("plothover", function(event, pos, item) {
            if (item) {
              var label = item.series.label;
              var dataValue = Math.round(item.series.percent);
              $("#tooltip").html(label + " - " + dataValue + "%").css({ top: item.pageY + 5, left: item.pageX + 5 }).fadeIn(200);
            } else {
              $("#tooltip").hide();
            }
          });
        });

      </script>

      <!-- bar chart -->


      <script type="text/javascript">

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

        </script>
        