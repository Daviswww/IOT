<?php
include 'dbControl.inc.php';
include 'mqtt.inc.php';
class MqttControl extends Mqtt
{

    function __construct()
    {
		
	}
    public function publish($msg)
    {
        $mqtt = $this->setmqtt();
        if ($mqtt->connect(true, NULL, $this->username, $this->password)) {
            $mqtt->publish("12345", $msg, 0);
            $mqtt->close();
        } else {
            echo "Time out!\n";
        }
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
            //echo $topics['ma']['function'] . "<br>";
        }

        $mqtt->close();
        //$this->procmsg($topic, $msg);
    }
}
function procmsg($topic, $msg)
{   
    $conn = new Dbcontrol();
    $conn->getINSdata($msg);
}