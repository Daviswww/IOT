$(function(){
    setInterval(function(){ update(); } ,1000);
    function update(){
        $.ajax({
            url:'../module/dbLast.php',
            method:'get',
            async : true,
            datatype: 'json',
            success:function(res){
                console.log(res['s0']);
            },
            error:function(err){
                console.log('publish fail!');
            }
        });

    };

    /*
    $.get("../module/dbLast.php", function(data){
        console.log(data['illumination']);
    });
    $.ajax({
        url:'../module/dbLast.php',
        method:'get',
        async : false,
        datatype: 'json',
        success:function(res){
          console.log('hey');
          document.getElementById('inside').innerHTML = res;
        },
        error:function(err){
            console.log('publish fail!');
        }
    });*/
});