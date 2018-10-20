<?php
/**
 * Created by PhpStorm.
 * User: benehiko
 * Date: 2018/10/05
 * Time: 4:07 AM
 */

ini_set('display_errors', 'On');
session_start();

if ((isset($_POST["username"])) && (!empty($_POST["username"]))){

    $username = $_POST["username"];
    $url = "http://localhost:8081/db/users/byUsername".$username;

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'something'
    ));

    $user = curl_exec($curl);
    curl_close($curl);
    if ($user !== FALSE){
        echo json_encode($user);
    }else{
        echo null;
    }

}else if (isset($_POST["firstname"]) && (isset($_POST["lastname"])) && (!empty($_POST["firstname"])) && (!empty($_POST["lastname"]))){

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];

    $url = "http://localhost:8081/db/users/byName/".$firstname."/".$lastname;
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'something'
    ));

    $user = curl_exec($curl);
    curl_close($curl);
    if ($user !== FALSE){
        echo json_encode($user);
    }else{
        echo null;
    }

}else if ((isset($_SESSION["loggedin"])) && (isset($_SESSION["username"])) && (!empty($_SESSION["loggedin"])) && !empty($_SESSION["username"])) {

    $url = "http://localhost:8081/db/users";
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'something'
    ));

    $users = curl_exec($curl);
    curl_close($curl);

    if ($users !== FALSE) {
        $result = array(
            'users' => $users
        );
        echo json_encode($result);
    } else {
        echo null;
    }
}else{
    echo null;
}