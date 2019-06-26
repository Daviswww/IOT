<?php
include '../module/dbGet.php';

$get = new Dbget();
?>


<!DOCTYPE htm>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.highcharts.com.cn/highcharts/highcharts.js"></script>
    <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
    <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!---<script type="text/javascript" src="../assets/js/Linechart.js"></script>--->
    <link rel="stylesheet" href="../assets/css/circle.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/formstyle.css">
    
  </head>
  <body>
  	<nav class="nav-main">
  	  <ul>
        <li><a href="home.php">IOT</a></li>
        <li><a href="publish.php">publish</a></li>
        <li><a href="select.php">select</a></li>
  	  </ul>
    </nav>	
    <div class="inside">
      <div class="ininder">
      <h1>Hello World!</h1>
      <div id="container" style="min-width:400px;height:400px"></div>
      <script type="text/javascript">
      Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
        function activeLastPointToolip(chart) {
            var points = chart.series[0].points;
            chart.tooltip.refresh(points[points.length -1]);
            var points = chart.series[1].points;
            chart.tooltip.refresh(points[points.length -1]);
        }
        var chart = Highcharts.chart('container', {
            chart: {
                type: 'spline',
                marginRight: 10,
                events: {
                    load: function () {     
                        var series1 = this.series[0],series2 = this.series[1],
                            chart = this;
                        activeLastPointToolip(chart);
                        setInterval(function () {
                            <?php
                                $list = $get->getLASTdata();
                                echo 'var list ='.json_encode($list) . ';'; 
                            ?>
                            var x = (new Date()).getTime(),                 // time
                                y = parseInt(list['air_humidity'], 10);     // num
                            console.log(y);
                            series1.addPoint([x, y], true, true);
                            activeLastPointToolip(chart);
                        }, 1000);
                        setInterval(function () {
                            <?php
                                $list = $get->getLASTdata();
                                echo 'var list ='.json_encode($list) . ';'; 
                            ?>
                            var x = (new Date()).getTime(),                 // time
                                y = parseInt(list['soil_humidity'], 10);    // num
                            series2.addPoint([x, y], true, true);
                            activeLastPointToolip(chart);
                        }, 1000);
                    }
                }
            },
            title: {
                text: '即時監控'
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            legend: {
                enabled: false
            },
            series: [{
                name: 'air_humidity',
                data: (function () {
                    var data = [],
                        time = (new Date()).getTime(),
                        i;
                    for (i = -19; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: Math.random()
                        });
                    }
                    return data;
                  }())
            },
            {name: 'soil_humidity',
                data: (function () {
                    var data = [],
                        time = (new Date()).getTime(),
                        i;
                    for (i = -19; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: Math.random()
                        });
                    }
                    return data;
                  }())
            }
          ]
        });
      </script>
      <div id="line_top_x">
          
      </div>
      </div>
    </div>
    </body>
  </html>