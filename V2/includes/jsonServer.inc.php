<?php

class jsonServer
{
    protected $url;

    public function get($url)
    {
        $this->url = $url;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $result = curl_exec($ch);
        return $result;
    }

    public function put($url, $data)
    {
        $this->url = $url;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $result = curl_exec($ch);
    }

    public function post($url, $data)
    {
        $this->url = $url;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $result = curl_exec($ch);
    }
}
/*
//Example:
$url = 'http://localhost:3000/sensor';

$a = new jsonServer();
$jds = json_decode($a->get($url));
for($i = 0 ; $i < sizeof($jds); $i++)
{
    echo json_encode($jds[$i]->{'name'});
}
*/
?>