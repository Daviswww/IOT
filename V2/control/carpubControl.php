<?php
include '../module/mqttGet.php';
$mqtt = new Mqttget();
$topic = 'car';
$msg = $_POST['msg'];
$mqtt->publish($topic, $msg);