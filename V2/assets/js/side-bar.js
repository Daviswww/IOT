var go = false;
$(document).ready(function(){
    $('#sidebar').click(function (){        
        if(go)
        {
            document.getElementById('lst-menu').style.display = "none";
            document.getElementById('side-menu').style.width = 0;
            go = false;
        }
        else{
            document.getElementById('side-menu').style.width = '250px';
            setTimeout(function(){ document.getElementById('lst-menu').style.display = "block"; }, 500);
            go = true;
        }
    });
});