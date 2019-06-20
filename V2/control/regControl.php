<?php
include '../module/registered.php';

if(isset($_POST['signin'])){
    //Check if inputs are empty
    if (empty($_POST['user_uid']) || empty($_POST['user_password'])) 
    {
        header ("Location: ../index.php?signin=empty");
        exit();
    } 
    else
    {
        $uid = $_POST['user_uid'];
        $psw = $_POST['user_password'];
        
        $reg = new Registered();
        $reg->signin($uid, $psw);
    }
}

if(isset($_POST['signup'])){
    //Check for empty fields
    if (empty($_POST['user_FirstName'])  || empty($_POST['user_LastName']) || empty($_POST['user_uid']) || empty($_POST['user_email'])||empty($_POST['user_password'])) 
    {
        header ("Location: ../index.php?signup=empty");
        exit();
    } 
    else 
    {
        $fname = $_POST['user_FirstName'];
        $lname = $_POST['user_LastName'];
        $uid = $_POST['user_uid'];
        $email = $_POST['user_email'];
        $psw = $_POST['user_password'];

        $reg = new Registered();
        $reg->signup($fname, $lname, $email, $uid, $psw);
    }
}

