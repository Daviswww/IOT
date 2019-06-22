<?php
include 'dbGet.php';
$op = $_POST['opcount'];
$get = new Dbget();
$last = $get->getLASTdata();

if($op == 0){
    echo "air_humidity: ".$last['air_humidity'];
}
elseif($op == 1){
    echo "soil_humidity: ".$last['soil_humidity'];
}
elseif($op == 2){
    echo "temperature: ".$last['temperature'];
}
elseif($op == 3){
    echo "rainfall: ".$last['rainfall'];
}
elseif($op == 4){
    echo "illumination: ".$last['illumination'];
}



