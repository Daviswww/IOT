var j = $.getJSON({url:'./../../config.json', async:false});
var host = j.responseJSON.host;
$(function(){
    $.ajax({         
        url: 'http://'+host+':3000/sensor',
        cache: false,
        dataType: 'json',
        type:'GET',
        success: function(res) {
            res.forEach(function(sensor) {
                $('#sensor').append(
                    "<div class=\"box1\">"+
                        "<div id=\"c"+sensor.order+"\" class=\"temp\">"+
                            sensor.name+":"+
                            "<div class=\"num\" id=\"s"+sensor.order+"\">Loding...</div>"+
                        "</div>"+
                    "</div>");
            });
        },
        error: function(xhr) {
            console.log('server fail!');
        }
    }).done(function(res){
        console.log('Sensor ready!');
    });

    setInterval(function(){ showData(); } ,1000);
    function showData(){
        $.getJSON('../../V2/assets/api/sensor.php', function(data) { 
            for(var i = 0; i <= Object.keys(data).length-2; i++){
                if(data['s'+i] == null){
                    break;
                }
                
                if(data['s'+i] == -404){
                    $("#s"+i).html("X");
                    document.getElementById('c'+i).style.background = "rgb(219, 70, 70)";
                }
                else{
                    $("#s"+i).html(data['s'+i]);
                    document.getElementById('c'+i).style.background = "#4eac78";
                }
            };
        })
    }
});