<?php
include 'dbGet.php';

$get = new Dbget();
$tb = 'status';
$last = $get->getLASTdata($tb);
$jsn = json_encode($last);
echo $jsn;



