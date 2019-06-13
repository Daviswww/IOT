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
        $this->server = "broker.mqtt-dashboard.com";
        $this->port = "1883";
        $this->username = "";
        $this->password = "";
        $this->client_id = "phpMQTT-publisher";

        $mqtt = new phpMQTT($this->server, $this->port, $this->client_id);
        return $mqtt;
    }
}