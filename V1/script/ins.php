<?php
include '../includes/dbcontrol.inc.php';

if(empty($_GET['a']) ||empty($_GET['b']) ||empty($_GET['c']) )
{
	header ("Location: ../page/insert.php?insert=empty");
}
else
{
	$a = $_GET['a'];
	$b = $_GET['b'];
	$c = $_GET['c'];
	$d = $_GET['d'];
	$get = new dbcontrol();
	$get->getINSdata($a ,$b ,$c, $d);
}
