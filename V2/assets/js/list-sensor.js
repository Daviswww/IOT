var host = "localhost";
$(function(){
    $.getJSON('../assets/api/db.json', function(data) {         
        data['sensor'].forEach(function(sensors) {
            $('#sensor-list').append(
                "<li><a id=\"sensors-"+sensors.id+"\">"+ sensors.name +"</a></li>"
            );
        });
        document.getElementById('ls-tag').innerHTML= document.getElementById('sensors-1').innerHTML;
    }).done(function(res){
        console.log('Sensor ready!');
    });
});