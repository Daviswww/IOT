<?php
include '../module/dbGet.php';
$get = new Dbget();
if(empty($_COOKIE['uid'])){
  header("Location: ../index.php?loginXerror");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <!---<link rel="stylesheet" href="resetstyle.css">--->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://code.highcharts.com.cn/highcharts/highcharts.js"></script>
    <script src="https://code.highcharts.com.cn/highcharts/modules/exporting.js"></script>
    <script src="https://img.hcharts.cn/highcharts-plugins/highcharts-zh_CN.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--<script src="../assets/js/Linechart.js"></script>-->
    <script src="../assets/js/main.js"></script>
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
      <div class="userid">
        <ul >
          <li>USER: <?php echo $_COOKIE['uid'];?></li>
          <li><a name="signout"  href="../control/sign-out.php">sign-out</a></li>
        </ul>
      </div>
    </nav>
    <div class="inside">
    <div class="container">
        <div class="item1">
          <div id="chart">
          <div id="container" style="min-width:400px;height:400px"></div>
          <script>
          var list;
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
                            //var obj = jQuery.get('../module/data.json');
                            try{
                              jQuery.getJSON( "../module/data.json", function( data ) {
                                list = data;
                              });                             
                            }catch(err){


                            }

                            console.log(list);
                            var x = (new Date()).getTime(),     // time
                                y = parseInt(list['air_humidity'], 10);           // num
                            series1.addPoint([x, y], true, true);
                            activeLastPointToolip(chart);
                        }, 1000);
                        setInterval(function () {
                            var x = (new Date()).getTime(),    // time
                                y = parseInt(list['soil_humidity'], 10);          // num
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
                    // 生成随机值
                    var data = [],
                        time = (new Date()).getTime(),
                        i;
                    for (i = -19; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 0
                        });
                    }
                    return data;
                  }())
            },
            {name: 'soil_humidity',
                data: (function () {
                    // 生成随机值
                    var data = [],
                        time = (new Date()).getTime(),
                        i;
                    for (i = -19; i <= 0; i += 1) {
                        data.push({
                            x: time + i * 1000,
                            y: 0
                        });
                    }
                    return data;
                  }())
            }
          ]
        });
          </script>
          </div>
        </div>
        <div class="item2">
          <h1 id="air_humidity">
          </h1>
        </div>
        <div class="item3">
          <h1 id="soil_humidity">
          </h1>
        </div>
        <div class="item4">
          <h1 id="temperature">
          </h1>
        </div>
        <div class="item5">
          <h1 id="rainfall">
          </h1>
        </div>
        <div class="item6">
          <h1 id="illumination">
          </h1>
        </div>
      </div>
    </div>
    </body>
  </html>