<?php
include '../includes/dbh.inc.php';
class registered extends Dbh{

    private $fname;
    private $lname;
    private $email;
    private $uid;
    private $psw;

    public function signup($fname, $lname, $email, $uid, $psw){
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->uid = $uid;
        $this->psw = $psw;
    
        //Check if input characters are valid
        if ( !preg_match("/^[a-zA-Z]*$/", $this->fname) && !preg_match("/^[a-zA-Z]*$/", $this->lname)) 
        {
            header ("Location: ../index.php?signup=invalid");
            exit();
        } 
        else 
        {
            //Check if email is valid
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
            {
                header ("Location: ../index.php?signup=email");
                exit();
            } 
            else 
            {
                $sql = "SELECT * FROM users WHERE users_id='$this->uid'";
                $result = $this->connect()->query($sql);
                $numRows = $result->num_rows;
                if ($numRows > 0) 
                {
                    header ("Location: ../index.php?signup=usertaken");
                    exit();
                }
                else 
                {
                    //Hashing the password
                    $hashedPwd = password_hash($this->psw, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "INSERT INTO users (users_first, users_last, users_email, users_id, users_psw) VALUES ('$this->fname', '$this->lname', '$this->email', '$this->uid', '$hashedPwd');";
                    $result = $this->connect()->query($sql);
                    header ("Location: ../index.php");
                    exit();
                }
            }
        }
    }

    public function signin($uid, $psw)
    {
        $this->uid = $uid;
        $this->psw = $psw;
    
        //Error handlers

        $sql = "SELECT * FROM users WHERE users_id='$this->uid' OR users_email='$this->uid'";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows < 1) 
        {
            header("Location: ../index.php?login=rowError");
            exit();
        } 
        else 
        {
            if ($row = $result->fetch_assoc())
            {
                //De-hashing the paswrd
                $hashedPwdCheck = password_verify($this->psw, $row['users_psw']);
                if ($hashedPwdCheck == false) 
                {
                    header("Location: ../index.php?login=error");
                    exit();
                } 
                elseif ($hashedPwdCheck == true) 
                {
                    //set cookie time
                    setcookie("uid", $this->uid, time() + (86400 * 30), "/");
                    header("Location: ../view/home.php?login=success");
                    exit();
                }
            }
        }
    }
    public function signout(){
        session_unset();
        session_destroy();
        setcookie("uid", "", time() - (86400 * 30), "/");
        header("Location: ../index.php");
        exit();
    }
}