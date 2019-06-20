<?php
session_start();
//include '../includes/mqttControl.inc.php';
if(0)//empty($_GET['msg']))
{
	header ("Location: ../page/select.php?select=empty");
}
else
{
	
	//$_SESSION["msg"] = "";
	$_SESSION["count"]++;
	$_SESSION["msg"] .= "ABCDCE<br>";
	//echo $_SESSION["msg"];
	
	echo $_SESSION["sub"];
	if($_SESSION["count"] == 10)
	{
		//$_SESSION["msg"] = '';
		$_SESSION["count"] = 0;	
	}
	echo "start<BR>\n";
	//$fp= popen("nohup php shell.php > /dev/null &",'w');
	//pclose($fp);
	echo "OK".date("Y-m-d H:i:s");
}
