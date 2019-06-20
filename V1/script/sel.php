<?php
session_start();
include '../includes/dbcontrol.inc.php';

if(empty($_GET['date']) && empty($_GET['time']))
{
	header ("Location: ../page/select.php?select=empty");
}
else
{
	$_SESSION["check"] = true;
	$_SESSION["date"] = $_GET['date'];
	header ("Location: ../page/select.php?select=done");
}
