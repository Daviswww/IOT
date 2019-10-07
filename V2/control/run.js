var exec = require("child_process").exec;

exec("start php mqttSub.php", 
function (error, stdout, stderr) {
    console.log(stdout.toString('utf8'));
});

exec("start json-server ../assets/api/db.json", 
function (error, stdout, stderr) {
    console.log(stdout.toString('utf8'));
});

exec("start php autoControl.php", 
function (error, stdout, stderr) {
    console.log(stdout.toString('utf8'));
});

