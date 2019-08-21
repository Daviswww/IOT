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
                "<li><a id=\"sensor-"+sensors.id+"\">"+ sensors.name +"</a></li>"
            );
            $('#auto-on-Order').append(
                "<option value=\""+sensors.order+"\">"+sensors.name +"</option>"
            );
            $('#auto-off-Order').append(
                "<option value=\""+sensors.order+"\">"+sensors.name +"</option>"
            );
        });
    }).fail(function(err){
        console.log("sensor err!");
    });
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
                "<li><a id=\"switch-"+switchs.id+"\">"+ switchs.name+switchs.typeName +"</a></li>"
            );
            $('#auto-switch-order').append(
                "<option value=\""+switchs.order+"\">"+switchs.name+switchs.typeName+"</option>"
            );
        });
    }).fail(function(err){
        console.log("switch err!");
    });
    $.ajax({
        type : "GET",
        async : true,
        url : 'http://'+host+':3000/camera',
        datatype : 'json',
        data: {},
        timeout: 1000,
        success:function(suc){
            console.log("Get camera!");
        },
        error:function(err){
            console.log(err);
        }
    }).done(function(res){
        res.forEach(function(camera) {
            $('.camera-list').append(
                "<li><a id=\"camera-"+camera.id+"\">"+ camera.description +"</a></li>"
            );
        });
    }).fail(function(err){
        console.log("camera err!");
    });
    $.ajax({
        type : "GET",
        async : true,
        url : 'http://'+host+':3000/auto',
        datatype : 'json',
        data: {},
        timeout: 1000,
        success:function(suc){
            console.log("Get auto!");
        },
        error:function(err){
            console.log(err);
        }
    }).done(function(res){
        res.forEach(function(auto) {
            $('.auto-list').append(
                "<li><a id=\"autos-"+auto.id+"\">"+ auto.description +"</a></li>"
            );
        });
    }).fail(function(err){
        console.log("switch err!");
    }); 
    $("#SelectType").click(function(){
        var val=$('input:radio[name="type"]:checked').val();
        if(val=="sensor"){
            document.getElementById('sensor-list').style.display = "block";
            document.getElementById('sensor-form').style.display = "block";
            document.getElementById('switch-list').style.display = "none";
            document.getElementById('switch-form').style.display = "none";
            document.getElementById('auto-list').style.display = "none";
            document.getElementById('auto-form').style.display = "none";
            document.getElementById('camera-list').style.display = "none";
            document.getElementById('camera-form').style.display = "none";  
        }
        else if(val=="switch"){
            document.getElementById('sensor-list').style.display = "none";
            document.getElementById('sensor-form').style.display = "none";
            document.getElementById('switch-list').style.display = "block";
            document.getElementById('switch-form').style.display = "block";
            document.getElementById('auto-list').style.display = "none";
            document.getElementById('auto-form').style.display = "none";
            document.getElementById('camera-list').style.display = "none";
            document.getElementById('camera-form').style.display = "none";  
        }
        else if(val=="auto"){
            document.getElementById('sensor-list').style.display = "none";
            document.getElementById('sensor-form').style.display = "none";
            document.getElementById('switch-list').style.display = "none";
            document.getElementById('switch-form').style.display = "none";
            document.getElementById('auto-list').style.display = "block";
            document.getElementById('auto-form').style.display = "block";
            document.getElementById('camera-list').style.display = "none";
            document.getElementById('camera-form').style.display = "none";  
        }
        else if(val=="camera"){
            document.getElementById('sensor-list').style.display = "none";
            document.getElementById('sensor-form').style.display = "none";
            document.getElementById('switch-list').style.display = "none";
            document.getElementById('switch-form').style.display = "none";
            document.getElementById('auto-list').style.display = "none";
            document.getElementById('auto-form').style.display = "none";
            document.getElementById('camera-list').style.display = "block";
            document.getElementById('camera-form').style.display = "block";        
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
                document.getElementById('ls-tag').innerHTML= res.name;
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
     document.getElementById('camera-list').addEventListener('click', function(e){
        if( e.target.tagName.toLowerCase() === 'a' ){
            $.ajax({
                type : "GET",
                async : true,
                url : 'http://'+host+':3000/camera/'+e.target.id.split("-")[1],
                datatype : 'json',
                data: {},
                timeout: 1000
            }).done(function(res){
                document.getElementById('ls-tag').innerHTML= res.description;
                document.getElementById('camera-description').value = res.description;
                document.getElementById('camera-id-Number').value = res.id;
                document.getElementById('camera-ip').value = res.ip;
                document.getElementById('camera-order').value = res.order;
                document.getElementById('camera-type').value = res.type;
                document.getElementById('camera-port').value = res.port;
            }).fail(function(err){
                console.log(err);
            })
        }
     }, false);
     document.getElementById('auto-list').addEventListener('click', function(e){
        if( e.target.tagName.toLowerCase() === 'a' ){
            $.ajax({
                type : "GET",
                async : true,
                url : 'http://'+host+':3000/auto/'+e.target.id.split("-")[1],
                datatype : 'json',
                data: {},
                timeout: 1000
            }).done(function(res){
                document.getElementById('ls-tag').innerHTML= res.description;
                document.getElementById('auto-des').value = res.description;
                document.getElementById('auto-id-Number').value = res.id;
                document.getElementById('auto-order').value = res.order;
                document.getElementById('auto-switch-order').value = res.switchOrder;
                document.getElementById('auto-on-Norm').value = res.onNorm;
                document.getElementById('auto-off-Norm').value = res.offNorm;
                document.getElementById('auto-on-Order').value = res.onOrder;
                document.getElementById('auto-off-Order').value = res.offOrder;
                document.getElementById('auto-off-Symbol').value = res.offSymbol;
                document.getElementById('auto-on-Symbol').value = res.onSymbol;
            }).fail(function(err){
                console.log(err);
            })
        }
     }, false);
});