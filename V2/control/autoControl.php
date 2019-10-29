<?php
include '../module/jsonServer.php';
include '../module/mqttGet.php';
echo "Start!\n";

$time = 0;
$path = 'D:/XAMPP/htdocs/IOT/V2/assets/database/';
$statusUrl = 'status';
$sensorUrl = 'sensor';
$autoUrl = 'http://localhost:3000/auto/';
$json = new jsonServer();
$get = new Dbget();
$mqtt = new Mqttget();
$auto = json_decode($json->get($autoUrl));
$date = date("Y-m-d",(time()+6*3600));
while(true)
{
    $now = strtotime(date("Y-m-d",(time()+6*3600)));
    $sensor = $get->getLASTdata($sensorUrl);
    $switch = $get->getLASTdata($statusUrl);
    if($time==10){
        echo "GET 200 json server\n";
        $time = 0;
        $auto = json_decode($json->get($autoUrl));
        if($now > strtotime($date)){
            $get->outOfCsv(($path ."sensor/". $date . ".csv"), 'sensor');
            $get->outOfCsv(($path ."status/". $date . ".csv"), 'status');
            echo "Save csv done!\n";
            $date = date("Y-m-d",(time()+6*3600));
        }
    }
    try{
        for($i = 0; $i < sizeof($auto); $i++){
            //switch on
            if($auto[$i]->{'onOrder'} == "date"){
                $sen = strtotime(date("H:i",(time()+6*3600)));
                $nor = strtotime($auto[$i]->{'onNorm'});
            }else{
                $sen = $sensor['s' . $auto[$i]->{'onOrder'}];
                $nor = (int)$auto[$i]->{'onNorm'};
            }

            if(($auto[$i]->{'onSymbol'} == '>') &&
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 0) && 
            ( $sen > $nor)){
                $msg = "n" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            else if(($auto[$i]->{'onSymbol'} == '=') && 
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 0) &&
            ($sen == $nor)){
                $msg = "n" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            else if(($auto[$i]->{'onSymbol'} == '<') &&
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 0) &&
            ($sen < $nor)){
                $msg = "n" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            //switch off
            if($auto[$i]->{'offOrder'} == "date"){
                $sen = strtotime(date("H:i",(time()+6*3600)));
                $nor = strtotime($auto[$i]->{'offNorm'});
            }else{
                $sen = $sensor['s' . $auto[$i]->{'offOrder'}];
                $nor = (int)$auto[$i]->{'offNorm'};
            }

            if(($auto[$i]->{'offSymbol'} == '>') &&
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 1) &&
            ($sen > $nor)){
                $msg = "f" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            else if(($auto[$i]->{'offSymbol'} == '=') && 
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 1) &&
            ($sen == $nor)){
                $msg = "f" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }
            else if(($auto[$i]->{'offSymbol'} == '<') &&
            ($switch['s' . $auto[$i]->{'switchOrder'}] == 1) &&
            ($sen < $nor)){
                $msg = "f" . $auto[$i]->{'switchOrder'};
                $mqtt->publish($msg);
            }   
        }
    }catch(Exception $err){
        echo "GET 404 server error!";
    }  
    $time+=1;
    echo "GET 200 AUTO #$time\n";
    sleep(1);
}