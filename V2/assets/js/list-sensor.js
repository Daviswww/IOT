var host = "localhost";
$(function(){
    /*
    $.getJSON('../assets/api/db.json', function(data) {         
        data['sensor'].forEach(function(sensors) {
            $('#sensor-list').append(
                "<li><a id=\"sensors-"+sensors.id+"\">"+ sensors.name +"</a></li>"
            );
        });
        document.getElementById('ls-tag').innerHTML= document.getElementById('sensors-1').innerHTML;
    });*/
    $.ajax({
        type : "GET",
        async : true,
        url : 'http://'+host+':3000/sensor',
        datatype : 'json',
        data: {},
        timeout: 1000,
        success:function(suc){
            console.log("Get Sensor!");
        },
        error:function(err){
            console.log(err);
        }
    }).done(function(res){
        res.forEach(function(sensors) {
            $('#sensor-list').append(
                "<li><a id=\"sensors-"+sensors.id+"\">"+ sensors.name +"</a></li>"
            );
        });
        document.getElementById('ls-tag').innerHTML= document.getElementById('sensors-1').innerHTML;
    }).fail(function(err){
        console.log(err);
    })
});