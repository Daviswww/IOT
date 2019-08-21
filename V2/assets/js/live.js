$(function(){
    $.getJSON('../assets/api/db.json', function(res) { 
        res['camera'].forEach(function(camera) {
            $('#container').append(
            "<div class=\"A\">"+
                "<div class=\"B\">"+
                    "<img class=\"cam\" id=\"c"+(camera.order)+"\" src=\"http://"+camera.ip+":"+camera.port+"/"+camera.type+"?&user="+camera.user+"&pwd="+camera.pwd+"\" >"+
                "</div>"+
                "<div class=\"C\">"+
                "<p>"+camera.description+"</p>"+
                "</div>"+
            "</div>");
        });
    }).done(function(res){
        console.log('Sensor ready!');
    });
});
