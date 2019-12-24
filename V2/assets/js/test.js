//var obj = JSON.parse('./config.json');;


/*
var dict = {};
$.getJSON('./config.json', function(data)
{
    $.each( data, function( key, val ) {
        dict[key] = val;
        });
    console.log(dict);
});

console.log(dict);


var j = $.getJSON({url:'./../../../config.json', async:false});
var host = j.responseJSON.host;
console.log(host);
*/
var cfg = require("./../../config.json");
var host = cfg.host;
console.log(host);