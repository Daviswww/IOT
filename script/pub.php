<?php
session_start();
include '../includes/mqttControl.inc.php';

if(empty($_GET['msg']) )
{
	header ("Location: ../page/select.php?select=empty");
}
else
{
	$_SESSION["check"] = true;
    $_SESSION["msg"] = $_GET['msg'];
	$mqtt = new mqttControl();
	$mqtt->publish($_GET['msg']);
	header ("Location: ../page/publish.php?publish=done");
}
