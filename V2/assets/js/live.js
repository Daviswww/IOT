var j = $.getJSON({url:'./../../config.json', async:false});
var host = j.responseJSON.host;
$(function(){
    $.ajax({         
        url: 'http://'+host+':3000/camera',
        cache: false,
        dataType: 'json',
        type:'GET',
        success: function(res) {
            res.forEach(function(camera) {
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
        }
    }).done(function(res){
        console.log('camera ready!');
    });
});
