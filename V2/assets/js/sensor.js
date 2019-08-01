$(function(){
    setInterval(function(){ showData(); } ,1000);
    $.ajax({
        type : "GET",
        async : true,
        url : 'http://localhost:3000/sensor',
        datatype : 'json',
        data: {},
        timeout: 1000,
        success:function(suc){
            console.log("Sensor Ready!");
        },
        error:function(err){
            console.log(err);
        }
    }).done(function(res){
        res.forEach(function(sensor) {
            $('#container').append(
            "<div class=\"A\">"+
                "<div class=\"B\">"+
                    "<p id="+sensor.typeName+">"+sensor.tmpe+sensor.unit+"</p>"+
                    "<p>"+sensor.name+"</p>"+
                "</div>"+
                "<div class=\"C\">Edit</div>"+
            "</div>");
        });
    }).fail(function(err){
        console.log(err);
    })

    function showData(){
        $.ajax({
            type : "GET",
            async : true,
            url : 'http://localhost:3000/sensor',
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