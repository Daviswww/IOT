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
        /*
        if($msg=='q'){
            $json->{'lig_status'} = '1';
        }elseif($msg=='Q'){
            $json->{'lig_status'} = '0';
        }elseif($msg=='w'){
            $json->{'art_status'} = '1';
        }elseif($msg=='W'){
            $json->{'art_status'} = '0';
        }*/
        
    }
    else{
        echo "not found!";
    }
}
catch (Exception $e)
{
    echo "error!";
}