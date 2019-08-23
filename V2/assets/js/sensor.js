var host = "localhost";
$(function(){
    setInterval(function(){ showData(); } ,1000);
    $.ajax({         
        url: 'http://'+host+':3000/sensor',
        cache: false,
        dataType: 'json',
        type:'GET',
        success: function(res) {
            res.forEach(function(sensors) {
                $('#container').append(
                "<div class=\"A\">"+
                    "<div id =\"c"+sensors.order+"\" class=\"B\">"+
                        "<p class=\"bj kk\" id=\"s"+(sensors.order)+"\">"+sensors.tmpe+"</p><p class=\"bj kk\">"+sensors.unit+"</p>"+
                    "</div>"+
                    "<div class=\"C\">"+
                    "<p>"+sensors.name+"</p>"+
                    "</div>"+
                "</div>");
            });
        }
    }).done(function(res){
        console.log('Sensor ready!');
    });
    function showData(){
        $.getJSON('../assets/api/sensor.php', function(data) { 
            for(var i = 0; i <= Object.keys(data).length-2; i++){
                if(data['s'+i] == null){
                    break;
                }
                $("#s"+i).html(data['s'+i]);
                document.getElementById('c'+i).style.background = "#4eac78";
            };
        })
    }
});