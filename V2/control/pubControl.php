<?php
include '../module/mqttGet.php';
$mqtt = new Mqttget();
try
{
    if(empty($_POST['msg']))
    {
        $msg = $_POST['msg'];
        if($msg=='q'){
            $json->{'lig_status'} = '1';
        }elseif($msg=='Q'){
            $json->{'lig_status'} = '0';
        }elseif($msg=='w'){
            $json->{'art_status'} = '1';
        }elseif($msg=='W'){
            $json->{'art_status'} = '0';
        }
        $mqtt->publish($msg);
    }
}
catch (Exception $e)
{
    echo "error!";
}