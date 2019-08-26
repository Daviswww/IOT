var exec = require("child_process").exec;

exec("php mqttSub.php", 
function (error, stdout, stderr) {
    console.log(stdout.toString('utf8'));
});

exec("json-server ../assets/api/db.json", 
function (error, stdout, stderr) {
    console.log(stdout.toString('utf8'));
});

exec("php autoControl.php", 
function (error, stdout, stderr) {
    console.log(stdout.toString('utf8'));
});

