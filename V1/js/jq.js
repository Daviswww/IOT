var counter = 0;
$(function(){

    setInterval(function(){ showDisplay(); } ,100);
    function showDisplay()
    {
        var url = "";
        var data = {'type':1};
        $.ajax({
        type : "POST",
        async : false, //同步请求
        url : url,
        data : data,
        timeout: 1000,
        success:function(msg)
        {
            //alert('in success ' + msg);
            //$("#qwe123").html('data');//要刷新的div
        },
        error: function() 
        {
            //alert('in error');
             //alert("失败，请稍后再试！");
        },
        complete:function()
        {
            //alert('in complete');

            $('#qwe123').load('../script/sub.php');
        }
    
        });
    }
});
