<?php
include '../module/mqttGet.php';
$msg = $_GET['msg'];
if($msg == 'open'){
    $msg = 'q';
}elseif($msg == 'close'){
    $msg = 'Q';
}
$mqtt = new Mqttget();
$mqtt->publish($msg);
header("Location: ../view/publish.php");