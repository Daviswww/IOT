$(document).ready(function(){
    $('#on').click(function (){        
        var a = document.getElementById('on').getAttribute('value');
        console.log(a);
    }),
    $('#off').click(function (){        
        var a = document.getElementById('off').getAttribute('value');
        console.log(a);
    });
});