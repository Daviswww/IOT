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
                $("#"+val+'s-'+id).remove();
                console.log(id);
            }).fail(function(err){
                console.log(err);
            })            
        }
        else{
            document.getElementById('errmsg').innerHTML= "* "+val+id+" not found!";
        }
    });
    $('#insert').on('click',function(){
        document.getElementById('errmsg').style.color= "red";
        let val=$('input:radio[name="type"]:checked').val();
        let typeName = $('#'+val+'-form > #'+val+'-type-Name').val().trim();
        let name = $('#'+val+'-form > #'+val+'-Name').val().trim();
        let unit, order;
        if(val === "sensor"){    
            unit = $('#'+val+'-form > #'+val+'-unit').val().trim();  
            if(!unit){
                document.getElementById('errmsg').innerHTML= "* "+val+" unit is empty!";
                return false;
            } 
        }
        else{
            order = $('#'+val+'-form > #'+val+'-order').val().trim();  
            if(!order){
                document.getElementById('errmsg').innerHTML= "* "+val+" order is empty!";
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
        if(getV(val, typeName)){
            if(val==="sensor"){
                $.ajax({
                    url:'http://'+host+':3000/'+val,
                    method:'post',
                    async : true,
                    datatype: 'json', 
                    data: {
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
            else{
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
        }
        else{
            document.getElementById('errmsg').innerHTML= "* "+val+" Type Name is repeat!";
        }
    });
    $('#modify').on('click',function(){
        document.getElementById('errmsg').style.color= "red";
        let val=$('input:radio[name="type"]:checked').val();
        let id = $('#'+val+'-form > #'+val+'-id-Number').val().trim();
        let typeName = $('#'+val+'-form > #'+val+'-type-Name').val().trim();
        let name = $('#'+val+'-form > #'+val+'-Name').val().trim();
        let unit, order;
        if(val === "sensor"){
            unit = $('#'+val+'-form > #'+val+'-unit').val().trim();  
            if(!unit){
                document.getElementById('errmsg').innerHTML= "* "+val+" unit is empty!";
                return false;
            } 
        }
        else{
            order = $('#'+val+'-form > #'+val+'-order').val().trim();  
            if(!order){
                document.getElementById('errmsg').innerHTML= "* "+val+" order is empty!";
                return false;
            } 
        }
        if(!id){
            document.getElementById('errmsg').innerHTML= "* "+val+" id number is empty!";
            return false;
        }

        if(!typeName){
            document.getElementById('errmsg').innerHTML= "* "+val+" type name is empty!";
            return false;
        }
        if(!name){
            document.getElementById('errmsg').innerHTML= "* "+val+" name is empty!";
            return false;
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
            else{
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
        }
        else{
            document.getElementById('errmsg').innerHTML= "* "+val+" Type Name is repeat!";
        }
    });
    function getV(val, typeName, id){
        var go = true;
        $.ajax({
            url:'http://'+host+':3000/'+val,
            method:'get',
            async : false,
            datatype: 'json',
            success:function(suc){
                if(val == 'sensor'){
                    suc.forEach(function(sensors) {
                        if(sensors.typeName===typeName && sensors.id!=id)
                        {
                            go = false;
                        }
                    });
                }
                else{
                    suc.forEach(function(sensors) {
                        if(sensors.order===typeName && sensors.id!=id)
                        {
                            go = false;
                        }
                    });
                }

            },
            error:function(err){
                console.log("get error!")
            }
        });
        return go;
    }
});