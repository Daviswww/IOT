var host = "localhost";
$(function(){
    $('#delete').on('click',function(){
        document.getElementById('errmsg').style.color= "red";
        let val=$('input:radio[name="type"]:checked').val();
        let id=$('#'+val+'-form > #'+val+'-id-Number').val().trim();
        if(id){
            $.ajax({
                url: 'http://'+host+':3000/'+val+'/'+id,
                method: 'delete',
                datatype: 'json'
            }).done(function(res){
                document.getElementById('errmsg').style.color= "green";
                document.getElementById('errmsg').innerHTML= "* "+val+id+" is delete!";
                $("#"+val+'-'+id).remove();
            }).fail(function(err){
                console.log('delete fail!');
            })            
        }
        else{
            document.getElementById('errmsg').innerHTML= "* "+val+id+" not found!";
        }
    });
    $('#insert').on('click',function(){
        document.getElementById('errmsg').style.color= "red";
        let val=$('input:radio[name="type"]:checked').val(), id = '';
        let order = $('#'+val+'-form > #'+val+'-order').val().trim(); 
        //sensor and switch
        let typeName, unit, name;
        //auto
        if(!order){
            document.getElementById('errmsg').innerHTML= "* "+val+" order is empty!";
            return false;
        } 
        let description, switchOrder, onSymbol, onOrder, onNorm, offSymbol, offOrder, offNorm;
        if(val === "sensor" || val === "switch"){
            typeName = $('#'+val+'-form > #'+val+'-type-Name').val().trim();
            name = $('#'+val+'-form > #'+val+'-Name').val().trim();
            if(val === "sensor"){    
                unit = $('#'+val+'-form > #'+val+'-unit').val().trim();  
                if(!unit){
                    document.getElementById('errmsg').innerHTML= "* "+val+" unit is empty!";
                    return false;
                } 
            }
            if(!typeName){
                document.getElementById('errmsg').innerHTML= "* "+val+" type name is empty!";
                return false;
            }
            if(!name){
                document.getElementById('errmsg').innerHTML= "* "+val+" name is empty!";
                return false;
            }            
        }else{
            description = $('#'+val+'-form > #auto-des').val().trim();
            switchOrder = $('#'+val+'-form > #auto-switch-order').val().trim();
            onSymbol = $('#'+val+'-form > #auto-on-Symbol').val().trim();
            onOrder = $('#'+val+'-form > #auto-on-Order').val().trim();
            onNorm = $('#'+val+'-form > #auto-on-Norm').val().trim();
            offSymbol = $('#'+val+'-form > #auto-off-Symbol').val().trim();
            offOrder = $('#'+val+'-form > #auto-off-Order').val().trim();
            offNorm = $('#'+val+'-form > #auto-off-Norm').val().trim();
            if(!description){
                document.getElementById('errmsg').innerHTML= "* "+val+" description is empty!";
                return false;
            } 
            if(!switchOrder){
                document.getElementById('errmsg').innerHTML= "* "+val+" switchOrder is empty!";
                return false;
            } 
            if(!onSymbol || !onOrder || !onNorm){
                document.getElementById('errmsg').innerHTML= "* "+val+" turn on setting is empty!";
                return false;
            }
            if(!offSymbol || !offOrder || !offNorm){
                document.getElementById('errmsg').innerHTML= "* "+val+" turn off setting is empty!";
                return false;
            }
        }

        if(getV(val, order, id)){
            if(val==="sensor"){
                $.ajax({
                    url:'http://'+host+':3000/'+val,
                    method:'post',
                    async : true,
                    datatype: 'json', 
                    data: {
                        order : order,
                        typeName : typeName,
                        name: name,
                        tmpe: 0,
                        unit: unit
                    },
                    success:function(suc){
                        document.getElementById('errmsg').style.color= "green";
                        document.getElementById('errmsg').innerHTML= "accept new "+val+"!";
                        $('#sensor-list').append("<li><a id=\"sensors-"+suc.id+"\">"+ suc.name +"</a></li>");
                    },
                    error:function(err){
                        document.getElementById('errmsg').innerHTML= "* "+val+" post fail!";
                    }
                })
            }
            else if (val==="switch"){
                $.ajax({
                    url:'http://'+host+':3000/'+val,
                    method:'post',
                    datatype: 'json', 
                    data: {
                        order: order,
                        typeName : typeName,
                        name: name,
                        status: 0,
                    },
                    success:function(suc){
                        document.getElementById('errmsg').style.color= "green";
                        document.getElementById('errmsg').innerHTML= "accept new "+val+"!";
                        $('#sensor-list').append("<li><a id=\"switch-"+suc.id+"\">"+ suc.name +"</a></li>");
                    },
                    error:function(err){
                        document.getElementById('errmsg').innerHTML= "* "+val+" post fail!";
                    }
                })
            }
            else if(val==="auto"){
                $.ajax({
                    url:'http://'+host+':3000/'+val,
                    method:'post',
                    datatype: 'json', 
                    data: {
                        order: order,
                        description: description,
                        switchOrder: switchOrder,
                        onSymbol: onSymbol,
                        onOrder: onOrder,
                        onNorm: onNorm,
                        offSymbol: offSymbol,
                        offOrder: offOrder,
                        offNorm: offNorm,
                    },
                    success:function(suc){
                        document.getElementById('errmsg').style.color= "green";
                        document.getElementById('errmsg').innerHTML= "accept new "+val+"!";
                        $('#sensor-list').append("<li><a id=\"auto-"+suc.id+"\">"+ suc.name +"</a></li>");
                    },
                    error:function(err){
                        document.getElementById('errmsg').innerHTML= "* "+val+" post fail!";
                    }
                })
            }
        }
        else{
            document.getElementById('errmsg').innerHTML= "* "+val+" Type Name is repeat!";
        }
    });
    $('#modify').on('click',function(){
        document.getElementById('errmsg').style.color= "red";
        let val=$('input:radio[name="type"]:checked').val();
        let id = $('#'+val+'-form > #'+val+'-id-Number').val().trim();
        let order = $('#'+val+'-form > #'+val+'-order').val().trim(); 
        //sensor and switch
        let typeName, unit, name;
        //auto
        if(!order){
            document.getElementById('errmsg').innerHTML= "* "+val+" order is empty!";
            return false;
        } 
        let description, switchOrder, onSymbol, onOrder, onNorm, offSymbol, offOrder, offNorm;
        if(val === "sensor" || val === "switch"){
            typeName = $('#'+val+'-form > #'+val+'-type-Name').val().trim();
            name = $('#'+val+'-form > #'+val+'-Name').val().trim();
            if(val === "sensor"){    
                unit = $('#'+val+'-form > #'+val+'-unit').val().trim();  
                if(!unit){
                    document.getElementById('errmsg').innerHTML= "* "+val+" unit is empty!";
                    return false;
                } 
            }
            if(!typeName){
                document.getElementById('errmsg').innerHTML= "* "+val+" type name is empty!";
                return false;
            }
            if(!name){
                document.getElementById('errmsg').innerHTML= "* "+val+" name is empty!";
                return false;
            }            
        }else{
            description = $('#'+val+'-form > #auto-des').val().trim();
            switchOrder = $('#'+val+'-form > #auto-switch-order').val().trim();
            onSymbol = $('#'+val+'-form > #auto-on-Symbol').val().trim();
            onOrder = $('#'+val+'-form > #auto-on-Order').val().trim();
            onNorm = $('#'+val+'-form > #auto-on-Norm').val().trim();
            offSymbol = $('#'+val+'-form > #auto-off-Symbol').val().trim();
            offOrder = $('#'+val+'-form > #auto-off-Order').val().trim();
            offNorm = $('#'+val+'-form > #auto-off-Norm').val().trim();
            if(!description){
                document.getElementById('errmsg').innerHTML= "* "+val+" description is empty!";
                return false;
            } 
            if(!switchOrder){
                document.getElementById('errmsg').innerHTML= "* "+val+" switchOrder is empty!";
                return false;
            } 
            if(!onSymbol || !onOrder || !onNorm){
                document.getElementById('errmsg').innerHTML= "* "+val+" turn on setting is empty!";
                return false;
            }
            if(!offSymbol || !offOrder || !offNorm){
                document.getElementById('errmsg').innerHTML= "* "+val+" turn off setting is empty!";
                return false;
            }
        }
        if(getV(val, order, id)){
            if(val==="sensor"){
                $.ajax({
                    url:'http://'+host+':3000/'+val+'/'+id,
                    method:'put',
                    async : true,
                    datatype: 'json', 
                    data: {
                        order: order,
                        typeName : typeName,
                        name: name,
                        tmpe: 0,
                        unit: unit
                    },
                    success:function(suc){
                        document.getElementById('errmsg').style.color= "green";
                        document.getElementById('errmsg').innerHTML= "accept new "+val+"!";
                    },
                    error:function(err){
                        document.getElementById('errmsg').innerHTML= "* "+val+" put fail!";
                    }
                })
            }
            else if(val === "switch"){
                $.ajax({
                    url:'http://'+host+':3000/'+val+'/'+id,
                    method:'put',
                    datatype: 'json', 
                    data: {
                        order: order,
                        typeName : typeName,
                        name: name,
                        status: 0,
                    },
                    success:function(suc){
                        document.getElementById('errmsg').style.color= "green";
                        document.getElementById('errmsg').innerHTML= "accept new "+val+"!";
                    },
                    error:function(err){
                        document.getElementById('errmsg').innerHTML= "* "+val+" put fail!";
                    }
                })
            }
            else if(val === "auto"){
                $.ajax({
                    url:'http://'+host+':3000/'+val+'/'+id,
                    method:'put',
                    datatype: 'json', 
                    data: {
                        order: order,
                        description: description,
                        switchOrder: switchOrder,
                        onSymbol: onSymbol,
                        onOrder: onOrder,
                        onNorm: onNorm,
                        offSymbol: offSymbol,
                        offOrder: offOrder,
                        offNorm: offNorm,
                    },
                    success:function(suc){
                        document.getElementById('errmsg').style.color= "green";
                        document.getElementById('errmsg').innerHTML= "accept new "+val+"!";
                    },
                    error:function(err){
                        document.getElementById('errmsg').innerHTML= "* "+val+" put fail!";
                    }
                })
            }
        }
        else{
            document.getElementById('errmsg').innerHTML= "* "+val+" Type Name is repeat!";
        }
    });
    function getV(val, order, id){
        var go = true;
        $.ajax({
            url:'http://'+host+':3000/'+val,
            method:'get',
            async : false,
            datatype: 'json',
            success:function(suc){
                suc.forEach(function(sensors) {
                    if(sensors.order===order && sensors.id!=id)
                    {
                        go = false;
                    }
                });
            },
            error:function(err){
                console.log("get error!")
            }
        });
        return go;
    }
});