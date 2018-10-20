<?php
/**
 * Created by PhpStorm.
 * User: benehiko
 * Date: 2018/10/05
 * Time: 6:41 AM
 */

ini_set('display_errors', 'On');
session_start();
if ((isset($_POST["name"])) && (isset($_POST["level"])) && (!empty($_POST["name"])) && (!empty($_POST["level"]))){

    $url = "http://localhost:8081/db/usergroups";
    $name = $_POST["name"];
    $level = $_POST["level"];

    $data = array(
        'name' => $name,
        'level' => $level
    );

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'something',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data
    ));

    $groupcreated = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    if ($groupcreated !== FALSE){
        echo true;
    }else{
        echo false;
    }

}else if ((isset($_SESSION["loggedin"])) && (isset($_SESSION["username"])) && (!empty($_SESSION["loggedin"])) && !empty($_SESSION["username"])) {
    $url = "http://localhost:8081/db/usergroups";
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'something'
    ));

    $groups = curl_exec($curl);
    curl_close($curl);

    if ($groups !== FALSE) {
        $result = array(
            'usergroups' => $groups
        );
        echo json_encode($result);
    } else {
        echo null;
    }
}else{
    echo null;
}