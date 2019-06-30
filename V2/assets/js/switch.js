var list;

$(function(){
    
    setInterval(function(){ showDisplay(); } ,1000);
    
    function showDisplay()
    {
        try{
            jQuery.getJSON( "../database/status.json", function( data ) {
                list = data;
                //console.log(data);
            });                             

            if(parseInt(list['lig_status'], 10)){
                $("#lig_status").text("ON");
            }
            else{
                $("#lig_status").text("OFF");
            }

            if(parseInt(list['air_status'], 10)){
                $("#air_status").text("ON");
            }
            else{
                $("#air_status").text("OFF");
            }
        }catch(err){
            console.log('status ready');
        }
    }
    
});

$(document).ready(function(){
    $('#livon').click(function (){
        //alert("Value: " + $("#demo").val());
        $.ajax({         
            url: '../control/pubControl.php',
            cache: false,
            dataType: 'html',
            type:'GET',
            data: {
                msg: 'q'
            },
            error: function(xhr) {
                console.log('error');
            },
            success: function(response) {
                console.log('liv:'+response);
            }
        });
    }); 
    $('#livoff').click(function (){
        //alert("Value: " + $("#demo").val());
        $.ajax({         
            url: '../control/pubControl.php',
            cache: false,
            dataType: 'html',
            type:'GET',
            data: {
                msg : 'Q'
            },
            error: function(xhr) {
                console.log('error');
            },
            success: function(response) {
                console.log('liv:'+response);
            }
        });
    }); 
    $('#arton').click(function (){
        //alert("Value: " + $("#demo").val());
        $.ajax({         
            url: '../control/pubControl.php',
            cache: false,
            dataType: 'html',
            type:'GET',
            data: {
                msg: 'w'
            },
            error: function(xhr) {
                alert('Ajax request 發生錯誤');
            },
            success: function(response) {
                console.log('art:'+response);
            }
        });
    }); 
    $('#artoff').click(function (){
        //alert("Value: " + $("#demo").val());
        $.ajax({         
            url: '../control/pubControl.php',
            cache: false,
            dataType: 'html',
            type:'GET',
            data: {
                msg : 'W'
            },
            error: function(xhr) {
                console.log('error');
            },
            success: function(response) {
                console.log('art:'+response);
            }
        });
    }); 
});
