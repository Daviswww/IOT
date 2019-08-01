google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawChart);
var list;
function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['soil', 0],
    ['air', 0],
    ['temperature', 0],
    ['air', 0]
  ]);

  var options = {
    width: 400, height: 120,
    redFrom: 90, redTo: 100,
    yellowFrom:75, yellowTo: 90,
    minorTicks: 5
  };

var chart = new google.visualization.Gauge(document.getElementById('gauge'));

  chart.draw(data, options);

  setInterval(function() {
    try{
        jQuery.getJSON( "../database/data.json", function( data ) {
            list = data;
            //console.log(data);
        }); 

        data.setValue(0, 1, list['soil_humidity']);
        chart.draw(data, options);

        data.setValue(1, 1, list['air_humidity']);
        chart.draw(data, options);

        data.setValue(2, 1, list['temperature']);
        chart.draw(data, options);        
    }catch(err){
        console.log('gauge ready');
    }

  }, 1000);
}