<?php
include '../module/mqttGet.php';
$mqtt = new Mqttget();

try
{
    if(!empty($_POST['msg']))
    {
        $msg = $_POST['msg'];
        $mqtt->publish($msg);
        echo $msg;
    }
    else{
        echo "not found!";
    }
}
catch (Exception $e)
{
    echo "error!";
}