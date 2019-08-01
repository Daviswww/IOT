var go = false;
$(document).ready(function(){
    $('button').click(function (){        
        if(go)
        {
            console.log(document.getElementById('side-menu').style.height);
            document.getElementById('t1').style.width = '240px';
            setTimeout(function(){ document.getElementById('t1').style.height = '200px'; }, 500);
            setTimeout(function(){ document.getElementById('t2').style.width = '200px'; }, 500);
            setTimeout(function(){ document.getElementById('t3').style.width = '200px'; }, 500);
            go = false;
        }
        else{
            document.getElementById('t1').style.height = '400px';
            setTimeout(function(){ document.getElementById('t1').style.width = '500px'; }, 500);
            setTimeout(function(){ document.getElementById('t2').style.width = '500px'; }, 500);
            setTimeout(function(){ document.getElementById('t3').style.width = '500px'; }, 500);
            go = true;
        }
    });
});