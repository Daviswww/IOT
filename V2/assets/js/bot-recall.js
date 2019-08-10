$(function(){
    $('#msg-order').on('click',function(){
        let order = document.getElementById('msg-s').value;
        document.getElementById('bot-user').innerHTML = 'User: '+order;
        $.ajax({         
            url: '../control/pubControl.php',
            cache: false,
            dataType: 'String',
            type:'POST',
            data: {
                msg: order
            },
            error: function(xhr) {
                document.getElementById('bot-pc').innerHTML = 'Alice: 請再說一遍';
                console.log("recall error");
            },
            success: function(response) {
                document.getElementById('bot-pc').innerHTML = 'Alice: 接收到命令!';
                console.log('liv:'+response);
            }
        });
    });
});