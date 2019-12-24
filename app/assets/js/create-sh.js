var j = $.getJSON({url:'./../../config.json', async:false});
var host = j.responseJSON.host;
$(function(){
    var status = Array();
    for(var i = 0; i < 20; i++)
    {
        status[i] = 0;
    }
    $.ajax({         
        url: 'http://'+host+':3000/switch',
        dataType: 'json',
        async:false,
        type:'GET',
        success: function(res) {
            res.forEach(function(switchs) {
                $('#switch').append(
                    "<div class=\"box1\">"+
                    "<div id=\"c"+switchs.order+"\" class=\"temp\">"+
                    switchs.name+switchs.typeName+
                      "<div  class=\"onoffbtn\" id=\"btn"+switchs.order+"\">"+
                        "<input type=\"checkbox\" id=\"switch"+switchs.order+"\" />"+
                        "<label id=\"f"+switchs.order+"\" for=\"switch"+switchs.order+"\">&emsp;&emsp;&emsp;</label>"+
                      "</div>"+
                    "</div>"+
                  "</div>");
            });
            console.log('server sec!');
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
                        status[i] = 1;
                        document.getElementById("switch"+i).click();
                        $('#f'+i).attr('id',('n'+i));
                    }
                    document.getElementById('c'+i).style.background = "#4eac78";
                }
            };
        });
        console.log('Switch ready!');
    });
    
    //setInterval(function(){ showData(); } , 1000);
    function showData(){
        $.getJSON('../../V2/assets/api/status.php', function(data) { 
            for(var i = 0; i <= Object.keys(data).length-2; i++){
                if(data['s'+i] == null){
                    break;
                }
                if(data['s'+i] == -404){
                    document.getElementById('c'+i).style.background = "rgb(219, 70, 70)";
                }
                else{
                    if(data['s'+i] != status[i])
                    {
                        if(data['s'+i] === "1")
                        {
                            status[i] = 1;
                            document.getElementById("switch"+i).click();
                            $('#f'+i).attr('id',('n'+i));
                        }
                        else if(data['s'+i] === "0")
                        {
                            status[i] = 0;
                            document.getElementById("switch"+i).click();
                            $('#n'+i).attr('id',('f'+i)); 
                        }
                    }
                    document.getElementById('c'+i).style.background = "#4eac78";
                }
            };
        });
    }
});