<?php
include '../module/jsonServer.php';
include '../module/mqttGet.php';
echo "Start!\n";

$time = 0;
$statusUrl = 'status';
$sensorUrl = 'sensor';
$autoUrl = 'http://localhost:3000/auto/';
$json = new jsonServer();
$get = new Dbget();
$mqtt = new Mqttget();
$auto = json_decode($json->get($autoUrl));
while(true)
{
    if($time==60){
        echo "GET 200 json server\n";
        $time = 0;
        $auto = json_decode($json->get($autoUrl));
    }
    $sensor = $get->getLASTdata($sensorUrl);
    $switch = $get->getLASTdata($statusUrl);
    for($i = 0; $i < sizeof($auto); $i++){
        try{
            //switch on
            if(($auto[$i]->{'onSymbol'} == '>') &&
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 0) && 
            ($sensor['s' . $auto[$i]->{'onOrder'}] > (int)$auto[$i]->{'onNorm'})){
                $msg = "n" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            if(($auto[$i]->{'onSymbol'} == '=') && 
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 0) &&
            ($sensor['s' . $auto[$i]->{'onOrder'}] == (int)$auto[$i]->{'onNorm'})){
                $msg = "n" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            if(($auto[$i]->{'onSymbol'} == '<') &&
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 0) &&
            ($sensor['s' . $auto[$i]->{'onOrder'}] < (int)$auto[$i]->{'onNorm'})){
                $msg = "n" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            //switch off
            if(($auto[$i]->{'offSymbol'} == '>') &&
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 1) &&
            ($sensor['s' . $auto[$i]->{'offOrder'}] > (int)$auto[$i]->{'offNorm'})){
                $msg = "f" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            if(($auto[$i]->{'offSymbol'} == '=') && 
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 1) &&
            ($sensor['s' . $auto[$i]->{'offOrder'}] == (int)$auto[$i]->{'offNorm'})){
                $msg = "f" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            if(($auto[$i]->{'offSymbol'} == '<') &&
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 1) &&
            ($sensor['s' . $auto[$i]->{'offOrder'}] < (int)$auto[$i]->{'offNorm'})){
                $msg = "f" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }    
        }catch(Exception $err){
            echo $auto[$i]->{'description'} . "error!";
        }  
    }
    $time+=1;
    echo "GET 200 AUTO #$time\n";
    sleep(1);
}