<?php
include 'dbGet.php';

//$op = $_POST['opcount'];
$get = new Dbget();
$last = $get->getLASTdata();
$jsn = json_encode($last);
echo 'var mydata = ' . $jsn;
/*
$fp = fopen('../database/data.json', 'w');
fwrite($fp, json_encode($last));
fclose($fp);


if($op == 0){
    echo $last['air_humidity'] ."%";
}
elseif($op == 1){
    echo $last['soil_humidity'] ."%";
}
elseif($op == 2){
    echo $last['temperature']."℃";
}
elseif($op == 3){
    echo $last['rainfall']."mm";
}
elseif($op == 4){
    echo $last['illumination']."lux";
}
*/



