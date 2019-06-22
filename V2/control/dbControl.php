<?php
include '../module/dbGet.php';


$get = new Dbget();
$get->getINSdata($_GET['msg']);
