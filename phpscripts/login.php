<?php
require_once('curlrequests.php');
ini_set('display_errors', 'On');
session_start();

if ((isset($_POST['username'])) && (isset($_POST['password'])) && (!empty($_POST['username'])) && (!empty($_POST['password']))) {

    $url = "http://localhost:8081/auth/login/website";
    $ch = curl_init($url);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = array(
        "username" => $username,
        "password" => $password
    );

    $payload = json_encode($data);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    if ($result === FALSE) {
        echo "server error";
    } else {
        if ($result == true){
            setcookie("acs_login", $username, time()+10800, '../');
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
        }
        echo $result;
    }
}

