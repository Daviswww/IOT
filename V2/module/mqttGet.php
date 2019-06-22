<?php
include 'dbGet.php';
include 'D:/XAMPP/htdocs/IOT/V2/includes/mqtt.inc.php';
class Mqttget extends Mqtt
{
    public function publish($msg)
    {
        $mqtt = $this->setmqtt();
        if ($mqtt->connect(true, NULL, $this->username, $this->password)) {
            $mqtt->publish("12345", $msg, 0);
            $mqtt->close();
        } else {
            echo "Time out!\n";
        }
        header("Location: ../view/publish.php?pub=done&msg=". $msg);
    }
    public function subscribe()
    {
        $mqtt = $this->setmqtt();
        if(!$mqtt->connect(true, NULL, $this->username, $this->password)) {
            exit(1);
        }

        $topics['ma'] = array("qos" => 0, "function" => "procmsg");
        $mqtt->subscribe($topics, 0);
        
        while($mqtt->proc()){

        }

        $mqtt->close();
    }
}

function procmsg($topic, $msg)
{   
    $conn = new Dbget();
    $conn->getINSdata($msg);
    //echo $msg . "<br>";
}