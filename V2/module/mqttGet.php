<?php
include './dbGet.php';
include './../includes/jsonServer.inc.php';
include 'D:/XAMPP/htdocs/IOT/V2/includes/mqtt.inc.php';
$conn = new Dbget();
$jSer = new jsonServer();
$jds = json_decode($a->get($url));
for($i = 0 ; $i < sizeof($jds); $i++)
{
    echo json_encode($jds[$i]->{'name'});
}
class Mqttget extends Mqtt
{
    public function publish($msg)
    {
        $mqtt = $this->setmqtt();
        if ($mqtt->connect(true, NULL, $this->username, $this->password)) {
            //設定傳送對象
            $mqtt->publish("12345", $msg, 0);
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
        $topics['L'] = array("qos" => 0, "function" => "procmsg");
        $topics['H'] = array("qos" => 0, "function" => "procmsg");
        $mqtt->subscribe($topics, 0);
        
        while($mqtt->proc()){

        }

        $mqtt->close();
    }
}

function procmsg($topic, $msg)
{   
    if($topic == 'L')
    {
        $conn->getINSdata($msg);        
    }
    if($topic == 'H')
    {
        $conn->getINSdata($msg);        
    }
}