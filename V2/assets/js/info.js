var go = false;
$(document).ready(function(){
    $('#sidebar').click(function (){        
        if(go)
        {
            document.getElementById('side-menu').style.width = 0;
            go = false;
        }
        else{
            document.getElementById('side-menu').style.width = '250px';
            go = true;
        }
    });
});