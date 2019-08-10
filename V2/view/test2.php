<?php
include '../module/dbGet.php';

$con = new Dbget();
$s = '0,0,0';

$t = 'sensor';
$con->getINSdata($t, $s);
/*
INSERT INTO status(s0, s1, s2, s3) VALUES(0,0,0,0);
INSERT INTO sensor(s0, s1, s2) VALUES(0,0,0);

$con->getINSdata($t, $s);

$jds = json_decode($a->get($url));
$msg_sec = explode(",", $msg);
for($i = 0 ; $i < sizeof($msg_sec); $i++)
{
    $jds[$i]->{'tmpe'} = $msg_sec[$i];
    $a->put($url . ($i+1), $jds[$i]);
}*/


//Example:
/*
$url = 'http://localhost:3000/sensor/';
$a = new jsonServer();

$msg_sec = explode(",",$msg);
echo $msg_sec[3] . '<br>';

$jds = json_decode($a->get($url));
for($i = 0; $i < 6; $i++)
{
    $a[$i] = rand(0, 9);
}
for($i = 0; $i < 6; $i++)
{
    ec $a[$i];
}
/*
while(1){
    for($i = 0 ; $i < sizeof($jds); $i++)
    {
        $jds[$i]->{'tmpe'} = $msg_sec[$i];
        $a->put($url . ($i+1), $jds[$i]);
    }
}
*/
?>