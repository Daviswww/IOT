<?php

class Dbh 
{
    private $severname;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    protected function connect()
    {
        $this->severname = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "farm";
        $this->charset = "utf8";

        $conn = new mysqli($this->severname, $this->username, $this->password, $this->dbname);
        mysqli_set_charset($conn, $this->charset);
        return $conn;
    }
}
