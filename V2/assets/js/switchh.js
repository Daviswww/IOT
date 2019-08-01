$(function(){
    //setInterval(function(){  } ,1000);
    console.log("123");
    $.ajax({
        type : "GET",
        async : true,
        url : 'http://localhost:3000/switch',
        datatype : 'json',
        data: {},
        timeout: 1000,
        success:function(suc){
            console.log(suc);
        },
        error:function(err){
            console.log(err);
        }
    }).done(function(res){
        res.forEach(function(sensor) {
            $('#container').append(
                "<div  class=\"A\">"+
                "<div class=\"B\">"+
                    "<p class=\"D\">"+sensor.name+"</p>"+
                    "<p id="+sensor.typeName+">"+(sensor.status? "YES":"NO")+"</p>"+
                "</div>"+
                "<div class=\"C\">"+
                    "<div id=\"livon\" class=\"on\" >ON</div>"+
                    "<div id=\"livoff\" class=\"off\">OFF</div>"+
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
            url : 'http://localhost:3000/switch',
            datatype : 'json',
            timeout: 1000,
        }).done(function(res){
            res.forEach(function(sensor) {
                $("#"+sensor.typeName).html((sensor.status? "YES":"NO"));
            });
        }).fail(function(err){
            console.log('SWITCH Error!');
            console.log(err);
        })
    }
});