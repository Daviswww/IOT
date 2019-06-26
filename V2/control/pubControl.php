<?php
include '../module/mqttGet.php';
if(empty($_GET['msg']))
{
    header("Location: ../view/publish.php?msg=done");
}
else
{
    $msg = $_GET['msg'];
    if($msg == '開燈'){
        $msg = 'q';
    }elseif($msg == '關燈'){
        $msg = 'Q';
    }
    $mqtt = new Mqttget();
    $mqtt->publish($msg);
    header("Location: ../view/publish.php?msg=".$msg);
}
