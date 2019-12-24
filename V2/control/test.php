<?php
/*
include('../module/dbGet.php');
$path = 'D:/XAMPP/htdocs/IOT/V2/assets/database/status/';
$tb = 'sensor';
$db = new Dbget();
$date = date("Y-m-d",(time()+6*3600)) . '.csv';
$tb = 'status';
$db->cleanDB($tb);
*/
echo 'done!';
$cfg = json_decode(file_get_contents("./../../config.json"));
echo $cfg['host'];