<?php

ini_set('display_errors', 'On');
session_start();

if ((isset($_POST['username'])) && (isset($_POST['password'])) && (!empty($_POST['username'])) && (!empty($_POST['password']))) {

    $url = "http://178.128.139.92:8081/auth/login/website";

    $curl = curl_init();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = json_encode(array(
        "username" => $username,
        "password" => $password
    ));

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'something',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array('Content-Type:application/json')
    ));

    $result = curl_exec($curl);
    curl_close($curl);
    //$payload = json_encode($data);

//    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
//    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    $result = curl_exec($ch);
//    curl_close($ch);

    if ($result === FALSE) {
        echo "server error";
    } else {
        if ($result == true) {
            setcookie("acs_login", $username, time() + 10800, '../');
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            echo 1;
        }else echo 0;
    }
}

