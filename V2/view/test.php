<?php
include '../module/dbGet.php';


$date = date("Y-m-d",(time()+6*3600));
$get = new Dbget();

$get->getINSdata('sensor', '0, 0,0 ,0 ,0');


$path = "D:/XAMPP/htdocs/IOT/V2/assets/database/";
$get->outOfCsv(($path ."sensor/2.csv"), 'sensor');
echo 'done';