<?php

ini_set('display_errors', 'On');
if (isset($_POST["username"]) && isset($_POST["firstname"]) && isset($_POST["lastname"]) && isset($_POST["password"]) && isset($_POST["usergroup"])){

    if ((!empty($_POST["username"])) && (!empty($_POST["firstname"])) && (!empty($_POST["lastname"])) && (!empty($_POST["password"])) && (!empty($_POST["usergroup"]))){
        $url = "http://localhost:8081/db/users";

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $usergroup = $_POST['usergroup'];

        $user = array(
            "username" => $username,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "usergroup" => $usergroup
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'something',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $user
        ));

        $usercreated = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);


        $auth = array(
            "username" => $username,
            "password" => $password
        );

        if (isset($_POST["auth"]) == "website") {
            $auth_url = "http://localhost:8081/auth/register/website";
        }else{
            $auth_url = "http://localhost:8081/auth/register/mobile";
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $auth_url,
            CURLOPT_USERAGENT => 'something',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $auth
        ));

        $authuser = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);

        if ($authuser !== FALSE && $usercreated !== FALSE){
            echo json_encode(array(
                "success" => true
            ));
        }else{
            echo json_encode(array(
                "success" => false
            ));
        }
    }
}
