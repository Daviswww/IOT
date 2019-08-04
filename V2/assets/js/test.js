$(function(){
    $.getJSON('../assets/api/db.json', function(data) {         
        console.log(data['sensor'][0].tmpe);
    });
});