var count = 0;

$(function(){
    setInterval(function(){ showDisplay(); } ,1000);
    function showDisplay()
    {
        var url = "../module/dbLast.php";
        var data = {'type':1};
        $.ajax({
        type : "POST",
        async : false, //同步请求
        url : url,
        data : data,
        timeout: 1000,
        success:function(msg)
        {
            //update
            $("#air_humidity").load('../module/dbLast.php',{
                opcount : count++
            });
            $("#soil_humidity").load('../module/dbLast.php',{
                opcount : count++
            });
            $("#temperature").load('../module/dbLast.php',{
                opcount : count++
            });
            $("#rainfall").load('../module/dbLast.php',{
                opcount : count++
            });
            $("#illumination").load('../module/dbLast.php',{
                opcount : count++
            });
            count %= 5;
        },
        error: function() 
        {
            //alert('in error');
            $("#air_humidity").html('error');
            $("#soil_humidity").html('error');
            $("#temperature").html('error');
            $("#rainfall").html('error');
            $("#illumination").html('error');
        },
        });
    }
});

