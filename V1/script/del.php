<?php
include '../includes/dbcontrol.inc.php';

if(empty($_GET['a']))
{
	header ("Location: ../page/delete.php?delete=empty");
}
else
{
	$name = $_GET['a'];
	$get = new dbcontrol();
	$get->getDELdata($name);
}
