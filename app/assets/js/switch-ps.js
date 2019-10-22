$(function(){
    document.getElementById('switch').addEventListener('click', function(e){
        var id;
        if(e.target.id[0] == "n")
        {
            $('#n'+e.target.id[1]).attr('id',('f'+e.target.id[1]));
            id = 'f'+e.target.id[1];
        }
        else if(e.target.id[0] == "f")
        {
            $('#f'+e.target.id[1]).attr('id',('n'+e.target.id[1]));
            id = 'n'+e.target.id[1];
        }
        if(e.target.id[0] === 'n' || e.target.id[0] === 'f'){
            $.ajax({
                url:'../../V2/control/pubControl.php',
                method:'post',
                async : true,
                datatype: 'String', 
                data: {
                    msg : id
                },
                success:function(res){
                  //console.log(id);  
                },
                error:function(err){
                    console.log('publish fail!');
                }
            });              
        }
    });
    //document.getElementById("switch1").click();
});