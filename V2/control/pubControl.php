<?php
include '../module/mqttGet.php';
$msg = $_GET['msg'];
if($msg == 'open'){
    $msg = 'q';
}
$mqtt = new Mqttget();
$mqtt->publish($msg);