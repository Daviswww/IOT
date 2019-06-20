<?php
include 'mqttSet.inc.php';
class Mqtt
{
    protected $server;
    protected $port;
    protected $username;
    protected $password;
    protected $client_id;

    protected function setmqtt()
    {
        $this->server = "140.126.20.95";
        $this->port = "1883";
        $this->username = "dda";
        $this->password = "12312311";
        $this->client_id = "phpMQTT-publisher_1239u13his";

        $mqtt = new phpMQTT($this->server, $this->port, $this->client_id);
        return $mqtt;
    }
}