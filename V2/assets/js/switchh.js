$(function(){
    setInterval(function(){ showData() } ,1000);
    $.ajax({
        type : "GET",
        async : true,
        url : 'http://localhost:3000/switch',
        datatype : 'json',
        data: {},
        timeout: 1000,
        success:function(suc){
            console.log(suc);
            console.log("Switch Ready!");
        },
        error:function(err){
            console.log(err);
        }
    }).done(function(res){
        res.forEach(function(switchs) {
            $('#container').append(
                "<div  class=\"A\">"+
                "<div class=\"B\">"+
                    "<p class=\"D\">"+switchs.name+"</p>"+
                    "<p id=\""+switchs.typeName+"\">"+(switchs.status? "YES":"NO")+"</p>"+
                "</div>"+
                "<div class=\"C\">"+
                    "<div id=\"on"+switchs.typeName+"\" class=\"on\">ON</div>"+
                    "<div id=\"on"+switchs.typeName+"\" class=\"off\">OFF</div>"+
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
            res.forEach(function(switchs) {
                $("#"+switchs.typeName).html((switchs.status? "YES":"NO"));
            });
        }).fail(function(err){
            console.log('SWITCH Error!');
            console.log(err);
        })
    }
});