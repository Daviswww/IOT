$(function(){
    setInterval(function(){ showData() } ,1000);
    $.getJSON('../assets/api/db.json', function(res) { 
        res['switch'].forEach(function(switchs) {
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
    }).done(function(res){
        console.log('Switch ready!');
    });

    function showData(){
        $.getJSON('../assets/api/db.json', function(data) { 
            data['switch'].forEach(function(switchs) {
                $("#"+switchs.typeName).html((switchs.status? "YES":"NO"));
            });
        })
    }
});