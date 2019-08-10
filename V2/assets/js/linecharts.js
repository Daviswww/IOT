var idn = 0;
$(function(){
    
    document.getElementById('sensor-list').addEventListener('click', function(e){
        if( e.target.tagName.toLowerCase() === 'a' ){
            document.getElementById('ls-tag').innerHTML= e.target.innerHTML;
            idn = e.target.id.split("-")[1]-1;
        }
    }, false);

    Highcharts.setOptions({
        global: {
                useUTC: false
        }
    });
    function activeLastPointToolip(chart) {
        var points = chart.series[0].points;
        chart.tooltip.refresh(points[points.length -1]);
    }
    var chart = Highcharts.chart('container', {
        chart: {
                type: 'spline',
                marginRight: 10,
                events: {
                        load: function () {
                                var series = this.series[0],
                                        chart = this;
                                activeLastPointToolip(chart);
                                setInterval(function () {
                                        $.getJSON('../assets/api/sensor.php', function(data) {
                                                try{
                                                        var x = (new Date()).getTime(), y = parseInt((data['s'+idn] ? data['s'+idn] : 0) );
                                                        series.addPoint([x, y], true, true);
                                                        activeLastPointToolip(chart);                                                        
                                                }
                                                catch(err){
                                                        console.log('hey');
                                                }

                                        });                       
                                }, 1000);
                        }
                }
        },
         title: {
                text: '及時動態數據'
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
                name: '及時數據',
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
        }]
    });

});