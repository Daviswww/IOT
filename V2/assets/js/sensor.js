var host = "localhost";
$(function(){
    setInterval(function(){ showData(); } ,1000);
    $.getJSON('../assets/api/db.json', function(res) { 
        res['sensor'].forEach(function(sensors) {
            $('#container').append(
            "<div class=\"A\">"+
                "<div class=\"B\">"+
                    "<p class=\"bj kk\" id=\"s"+(sensors.order)+"\">"+sensors.tmpe+"</p><p class=\"bj kk\">"+sensors.unit+"</p>"+
                "</div>"+
                "<div class=\"C\">"+
                "<p>"+sensors.name+"</p>"+
                "</div>"+
            "</div>");
        });
    }).done(function(res){
        console.log('Sensor ready!');
    });

    function showData(){
        $.getJSON('../assets/api/sensor.php', function(data) { 
            for(var i = 0; i <= Object.keys(data).length-2; i++){
                $("#s"+i).html(data['s'+i]);
            };
        })
    }
});