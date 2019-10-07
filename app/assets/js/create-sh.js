var host = "localhost";
$(function(){
    $.ajax({         
        url: 'http://'+host+':3000/switch',
        cache: false,
        dataType: 'json',
        type:'GET',
        success: function(res) {
            res.forEach(function(switchs) {
                $('#switch').append(
                    "<div class=\"box1\">"+
                    "<div id=\"c"+switchs.order+"\" class=\"temp\">"+
                    switchs.name+switchs.typeName+
                      "<div  class=\"onoffbtn\">"+
                        "<input type=\"checkbox\" id=\"switch"+switchs.order+"\" />"+
                        "<label id=\"f"+switchs.order+"\" for=\"switch"+switchs.order+"\">&emsp;&emsp;&emsp;</label>"+
                      "</div>"+
                    "</div>"+
                  "</div>");
            });
        },
        error: function(xhr) {
            console.log('server fail!');
        }
    }).done(function(res){
        $.getJSON('../../V2/assets/api/status.php', function(data) { 
            for(var i = 0; i <= Object.keys(data).length-2; i++){
                if(data['s'+i] == null){
                    break;
                }
                if(data['s'+i] == -404){
                    document.getElementById('c'+i).style.background = "rgb(219, 70, 70)";
                }
                else{
                    if(data['s'+i] === "1")
                    {
                        document.getElementById("switch"+i).click();
                    }
                    document.getElementById('c'+i).style.background = "#4eac78";
                }
            };
        });
        console.log('Switch ready!');
    });
    console.log("done");
});