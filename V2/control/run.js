var exec = require("child_process").exec;

//start json-server --host 140.126.20.184 db.json
//start json-server --host 140.115.118.86 db.json
//json-server --host 51ab1942.ngrok.io --port 80 db.json
//172.20.10.11

exec("start json-server --host localhost ../assets/api/db.json", 
function (error, stdout, stderr) {
    console.log(stdout.toString('utf8'));
});

exec("start php mqttSub.php", 
function (error, stdout, stderr) {
    console.log(stdout.toString('utf8'));
});


exec("start php autoControl.php", 
function (error, stdout, stderr) {
    console.log(stdout.toString('utf8'));
});

