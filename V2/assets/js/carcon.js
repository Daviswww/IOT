$(function(){
    var left    = '#controller_left';
    var right   = '#controller_right';
    var up      = '#controller_up';
    var down    = '#controller_down';

    control(left,   'A');
    control(right,  'D');
    control(up,     'W');
    control(down,   'S');
});
function control(id, key){
    $(id)
    .mouseup(function() {
        pub('OFF');
    })
    .mousedown(function() {
        pub(key);
    });
}
function pub(cmd){
    $.ajax({
        url:'../control/carpubControl.php',
        method:'post',
        async : true,
        datatype: 'String', 
        data: {
            msg : cmd
        },
        success:function(res){
            console.log('WW');  
        },
        error:function(err){
            console.log(cmd);
        }
    });
}
