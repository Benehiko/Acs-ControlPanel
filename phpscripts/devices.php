<?php
session_start();

if (isset($_POST["mac"]) && (isset($_POST["alias"])) && (!empty($_POST["mac"])) && (!empty($_POST["alias"]))) {

    $url = "http://localhost:8081/db/devices";

    $curl = curl_init();

    $mac = $_POST["mac"];
    $alias = $_POST["alias"];

    $data = array(
        mac => $mac,
        alias => $alias
    );
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'something',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data
    ));

    $device = curl_exec($curl);

    if ($device !== FALSE){
        echo true;
    }else{
        echo false;
    }
}else if (isset($_SESSION["loggedin"]) && isset($_SESSION["username"]) && (!empty($_SESSION["loggedin"]) && (!empty($_SESSION["username"])))){

    $url = "http://localhost:8081/db/devices";
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'something'
    ));

    $devices = curl_exec($curl);
    curl_close($curl);
    if ($devices !==FALSE){
        $result = array(
            'devices' => $devices
        );
        echo json_encode($result);
    }else{
        echo null;
    }
}else{
    echo null;
}
