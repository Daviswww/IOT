<?php
include '../module/dbGet.php';


if(isset($_POST['select'])) {
    $name = $_POST['find'];

    $get = new Dbget();
    $get->getDELdata($name);
}
