<?php
include '../module/mqttGet.php';
include '../module/jsonServer.php';
$json = new jsonServer();
$mqtt = new Mqttget();
$url = 'http://localhost/IOT/V2/assets/api/status.php';
$topic = 'control';
try
{
    if(!empty($_POST['msg']))
    {
        $msg = $_POST['msg'];
        $data = json_decode($json->get($url));
        $status = json_decode($json->get($url))->{'s'.$msg[1]};
        if($msg[0] == 'n')
        {
            if(!$status)
            {
                $mqtt->publish($topic, $msg);
                echo "ON success!";
            }
        }
        else
        {
            if($status)
            {
                $mqtt->publish($topic, $msg);
                echo "OFF success!";
            }
        }

    }
    else{
        echo "not found!";
    }
}
catch (Exception $e)
{
    echo "error!";
}