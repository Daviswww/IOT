$(function(){
    setInterval(function(){ showData(); } ,1000);
    $.getJSON('../assets/api/db.json', function(res) { 
        res['switch'].forEach(function(switchs) {
            $('#container').append(
                "<div  class=\"A\">"+
                "<div id =\"c"+switchs.order+"\" class=\"B\">"+
                    "<p class=\"D\">"+switchs.name+switchs.typeName+"</p>"+
                    "<p id=\"s"+switchs.order+"\">Loding...</p>"+
                "</div>"+
                "<div class=\"C\">"+
                    "<div id=\"n"+switchs.order+"\" class=\"on\">ON</div>"+
                    "<div id=\"f"+switchs.order+"\" class=\"off\">OFF</div>"+
                "</div>"+
                "</div>");
        });
    }).done(function(res){
        console.log('Switch ready!');
    });

    function showData(){
        $.getJSON("../assets/api/status.php", function(data){
            for(var i = 0; i < Object.keys(data).length-2; i++){
                if(data['s'+i] == null){
                    break;
                }
                $("#s"+i).html((data['s'+i] == "1"? "ON":"OFF"));
                document.getElementById('c'+i).style.background = "#4eac78";
            }
        });
    }
});