var host = "localhost";
$(function(){
    setInterval(function(){ showData(); } ,1000);
    $.getJSON('../assets/api/db.json', function(res) { 
        res['sensor'].forEach(function(sensors) {
            $('#container').append(
            "<div class=\"A\">"+
                "<div class=\"B\">"+
                    "<p id="+sensors.typeName+">"+sensors.tmpe+sensors.unit+"</p>"+
                    "<p>"+sensors.name+"</p>"+
                "</div>"+
                "<div class=\"C\">"+
                    "<div class=\"on\" >Edit</div>"+
                    "<div class=\"off\">Delete</div>"+
                "</div>"+
            "</div>");
        });
    }).done(function(res){
        console.log('Sensor ready!');
    });

    function showData(){
        $.getJSON('../assets/api/db.json', function(res) { 
            res['sensor'].forEach(function(sensor) {
                $("#"+sensor.typeName).html(sensor.tmpe+sensor.unit);
            });
        })
    }
});