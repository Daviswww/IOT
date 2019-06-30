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
                            console.log(list);
                            var x = (new Date()).getTime(),     // time
                                y = parseInt(list['air_humidity'], 10);           // num
                            series1.addPoint([x, y], true, true);
                            activeLastPointToolip(chart);
                              }catch(e){}
                        }, 1000);
                        setInterval(function () {
                          try{
                            var x = (new Date()).getTime(),    // time
                                y = parseInt(list['soil_humidity'], 10);          // num
                            series2.addPoint([x, y], true, true);
                            activeLastPointToolip(chart);
                          }
                          catch(e){}
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