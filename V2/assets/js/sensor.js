var host = "localhost";
$(function(){
    setInterval(function(){ showData(); } ,1000);
    $.ajax({
        type : "GET",
        async : true,
        url : 'http://'+host+':3000/sensor',
        datatype : 'json',
        data: {},
        timeout: 1000,
        success:function(suc){
            console.log(suc);
            console.log("Sensor Ready!");
        },
        error:function(err){
            console.log(err);
        }
    }).done(function(res){
        res.forEach(function(sensors) {
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
    }).fail(function(err){
        console.log(err);
    })

    function showData(){
        $.ajax({
            type : "GET",
            async : true,
            url : 'http://'+host+':3000/sensor',
            datatype : 'json',
            timeout: 1000,
        }).done(function(res){
            res.forEach(function(sensor) {
                $("#"+sensor.typeName).html(sensor.tmpe+sensor.unit);
            });
        }).fail(function(err){
            console.log('showDB Error!');
        })
    }
});