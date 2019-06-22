google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
var num = 1305856000000;
var dd = new Date(num);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Year', 'Sales', 'Expenses'],
    ['2004',  1000,      400],
    ['2005',  1170,      460],
    ['2006',  660,       1120],
    ['2008',  1030,      540],
    ['2009',  1030,      540],
    ['2010',  1030,      540],
    ['2011',  1030,      540]
  ]);

  var options = {
    title: 'Company Performance',
    curveType: 'function',
    legend: { position: 'bottom' }
  };

  var chart = new google.visualization.LineChart(document.getElementById('chart'));

  chart.draw(data, options);
}