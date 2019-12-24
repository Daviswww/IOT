<?php
include '../module/dbGet.php';
include '../includes/mqtt.inc.php';

class Mqttget extends Mqtt
{
    public function publish($topic, $msg)
    {
        $mqtt = $this->setmqtt();
        if ($mqtt->connect(true, NULL, $this->username, $this->password)) {
            //設定傳送對象
            $mqtt->publish($topic, $msg, 0);
            $mqtt->close();
        } else {
            echo "Time out!\n";
        }
        //header("Location: ../view/publish.php?pub=done&msg=". $msg);
    }
    public function subscribe()
    {
        $mqtt = $this->setmqtt();
        if(!$mqtt->connect(true, NULL, $this->username, $this->password)) {
            exit(1);
        }
        //接收資料
        $topics['sensor'] = array("qos" => 0, "function" => "procmsg");
        $topics['status'] = array("qos" => 0, "function" => "procmsg");
        $mqtt->subscribe($topics, 0);
        
        while($mqtt->proc()){

        }

        $mqtt->close();
    }
}

function procmsg($topic, $msg)
{
    $conn = new Dbget();
    try{
        $conn->getINSdata($topic, $msg); 
        echo "GET 200 $topic $msg\n";
    }
    catch(Exception $err){
        echo "GET 500 $topic\n";
    }
}

?>