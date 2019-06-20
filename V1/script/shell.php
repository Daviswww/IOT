<?php

include 'D:/XAMPP/htdocs/IOT/includes/mqttControl.inc.php';
$mqtt = new mqttControl();
$mqtt->subscribe();
