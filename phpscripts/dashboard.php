<?php
/**
 * Created by PhpStorm.
 * User: benehiko
 * Date: 2018/10/04
 * Time: 11:27 PM
 */
ini_set('display_errors', 'On');

$url = "http://localhost:8081/db/vehicles";
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'something'
));
$vehicles = curl_exec($curl);

$url = "http://localhost:8081/db/devices";
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_USERAGENT => 'something'
));

$devices = curl_exec($curl);

curl_close($curl);
if ($devices !== FALSE && $vehicles !== FALSE){
    $data = array(
        'devices' => $devices,
        'vehicles' => $vehicles
    );
    echo json_encode($data);
}else{
    echo null;
}