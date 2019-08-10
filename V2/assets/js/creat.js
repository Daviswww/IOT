var host = "localhost";
$(function(){
    $.ajax({
        type : "GET",
        async : true,
        url : 'http://'+host+':3000/sensor',
        datatype : 'json',
        data: {},
        timeout: 1000,
        success:function(suc){
            console.log("Get Sensor!");
        },
        error:function(err){
            console.log(err);
        }
    }).done(function(res){
        res.forEach(function(sensors) {
            $('.sensor-list').append(
                "<li><a id=\"sensors-"+sensors.id+"\">"+ sensors.name +"</a></li>"
            );
        });
    }).fail(function(err){
        console.log(err);
    })
    $.ajax({
        type : "GET",
        async : true,
        url : 'http://'+host+':3000/switch',
        datatype : 'json',
        data: {},
        timeout: 1000,
        success:function(suc){
            console.log("Get switch!");
        },
        error:function(err){
            console.log(err);
        }
    }).done(function(res){
        res.forEach(function(switchs) {
            $('.switch-list').append(
                "<li><a id=\"switchs-"+switchs.id+"\">"+ switchs.name +"</a></li>"
            );
        });
    }).fail(function(err){
        console.log("switch err!");
    })
    $("#SelectType").click(function(){
        var val=$('input:radio[name="type"]:checked').val();
        if(val=="sensor"){
            document.getElementById('sensor-list').style.display = "block";
            document.getElementById('sensor-form').style.display = "block";
            document.getElementById('switch-list').style.display = "none";
            document.getElementById('switch-form').style.display = "none";
        }
        else{
            document.getElementById('sensor-list').style.display = "none";
            document.getElementById('sensor-form').style.display = "none";
            document.getElementById('switch-list').style.display = "block";
            document.getElementById('switch-form').style.display = "block";
        }          
     });
    document.getElementById('sensor-list').addEventListener('click', function(e){
        if( e.target.tagName.toLowerCase() === 'a' ){
            $.ajax({
                type : "GET",
                async : true,
                url : 'http://'+host+':3000/sensor/'+e.target.id.split("-")[1],
                datatype : 'json',
                data: {},
                timeout: 1000
            }).done(function(res){
                document.getElementById('sensor-id-Number').value = res.id;
                document.getElementById('sensor-order').value = res.order;
                document.getElementById('sensor-type-Name').value = res.typeName;
                document.getElementById('sensor-Name').value = res.name;
                document.getElementById('sensor-unit').value = res.unit;
            }).fail(function(err){
                console.log(err);
            })
        }
     }, false);
     document.getElementById('switch-list').addEventListener('click', function(e){
        if( e.target.tagName.toLowerCase() === 'a' ){
            $.ajax({
                type : "GET",
                async : true,
                url : 'http://'+host+':3000/switch/'+e.target.id.split("-")[1],
                datatype : 'json',
                data: {},
                timeout: 1000
            }).done(function(res){
                document.getElementById('ls-tag').innerHTML= res.name;
                document.getElementById('switch-id-Number').value = res.id;
                document.getElementById('switch-order').value = res.order;
                document.getElementById('switch-type-Name').value = res.typeName;
                document.getElementById('switch-Name').value = res.name;
            }).fail(function(err){
                console.log(err);
            })
        }
     }, false);
});