<?php
include 'mqtt.inc.php';
class MqttControl extends Mqtt
{
    public function publish($msg)
    {
        $mqtt = $this->setmqtt();
        if ($mqtt->connect(true, NULL, $this->username, $this->password)) {
            $mqtt->publish("bluerhinos/phpMQTT/examples/publishtest", $msg . date("r"), 0);
            $mqtt->close();
        } else {
            echo "Time out!\n";
        }
    }
}