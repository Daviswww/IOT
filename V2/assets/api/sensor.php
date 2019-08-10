<?php
include '../../module/dbGet.php';

$get = new Dbget();
$tb = 'sensor';
$last = $get->getLASTdata($tb);
$jsn = json_encode($last);
echo $jsn;