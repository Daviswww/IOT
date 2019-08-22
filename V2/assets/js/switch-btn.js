$(function(){
    document.getElementById('container').addEventListener('click', function(e){
        console.log(e.target.id[0]);
        if(e.target.id[0] === 'n' || e.target.id[0] === 'f'){
            $.ajax({
                url:'../control/pubControl.php',
                method:'post',
                async : true,
                datatype: 'String', 
                data: {
                    msg : e.target.id
                },
                success:function(res){
                  console.log(e.target.id);  
                },
                error:function(err){
                    console.log('publish fail!');
                }
            });              
        }
    });
});