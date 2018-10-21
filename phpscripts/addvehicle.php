<?php

ini_set('display_errors', 'On');
if ((isset($_POST["numberplate"])) && (isset($_POST["username"])) && (!empty($_POST["numberplate"])) && (!empty($_POST["username"]))) {

    $url = "http://localhost:8081/db/fleetvehicles";

    $curl = curl_init();

    $data = array(
        "numberplate" => $_POST["numberplate"],
        "username" => $_POST["username"]
    );

    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'something',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $data
    ));

    $msg = curl_exec($curl);
    curl_close($curl);

    if ($msg !== FALSE) {
        echo json_encode(array(
            "success" => true
        ));
    } else {
        echo json_encode(array(
            "success" => false
        ));
    }

}
