<?php
include '../module/mqttGet.php';
$mqtt = new Mqttget();
$filename = '../database/status.json';
$fp = fopen($filename, 'r');
$s = fread($fp, filesize($filename));
$json = json_decode($s);
fclose($fp);
if(empty($_GET['msg']))
{
    echo 'switch error';
}
else
{
    $msg = $_GET['msg'];
    if($msg=='q'){
        $json->{'lig_status'} = '1';
    }elseif($msg=='Q'){
        $json->{'lig_status'} = '0';
    }elseif($msg=='w'){
        $json->{'art_status'} = '1';
    }elseif($msg=='W'){
        $json->{'art_status'} = '0';
    }
    echo $msg;
    $mqtt->publish($msg);
}

$fp = fopen($filename, 'w');
$s = fwrite($fp, json_encode($json));
fclose($fp);