<?php
/**
 * Created by PhpStorm.
 * User: benehiko
 * Date: 2018/10/05
 * Time: 2:33 AM
 */

ini_set('display_errors', 'On');

if (isset($_POST["type"]) && !empty($_POST["type"])) {
    if ($_POST["type"] == "fleetvehicle") {

        if (isset($_POST["numberplate"]) && (!empty($_POST["numberplate"]))) {
            $url = "http://localhost:8081/db/fleetvehiclesWithUsers";
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => 'something'
            ));
            $data = curl_exec($curl);
            if ($data !== FALSE) {
                $result = array(
                    "results" => $data
                );
                echo json_encode($result);
            } else {
                echo null;
            }
        } else {
            echo null;
        }

    } else if ($_POST["type"] == "vehicle") {
        if ((isset($_POST["datefrom"])) && (isset($_POST["dateto"])) && (!empty($_POST["datefrom"])) && (!empty($_POST["dateto"]))) {

            $from = $_POST["datefrom"];
            $to = $_POST["dateto"];

            $url = "http://localhost:8081/db/vehicles/byDate/" . urlencode($from) . "/" . urlencode($to);

            if (isset($_POST["numberplate"]) && (!empty($_POST["numberplate"]))) {
                $url = "http://localhost:8081/db/vehicles/byDateNumberplate/" . urlencode($from) . "/" . urlencode($to) . "/" . $_POST["numberplate"];
            }

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => 'something'
            ));
            $vehicles = curl_exec($curl);
            curl_close($curl);
            if ($vehicles !== FALSE) {
                $result = array(
                    'vehicles' => $vehicles
                );
                echo json_encode($result);
            } else {
                echo null;
            }

        } else if (isset($_POST["numberplate"]) && (!empty($_POST["numberplate"]))) {

            $numberplate = $_POST["numberplate"];

            $url = "http://localhost:8081/db/vehicles/byNumberplate/" . $numberplate;
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => 'something'
            ));
            $vehicles = curl_exec($curl);
            curl_close($curl);
            if ($vehicles !== FALSE) {
                $data = array(
                    'vehicles' => $vehicles
                );
                echo json_encode($data);
            } else {
                echo null;
            }
        }
    } else if ($_POST["type"] == "image") {
        if (isset($_POST["id"]) && (!empty($_POST["id"]))) {
            $id = $_POST["id"];

            $url = "http://localhost:8081/db/vehicles/image/byVehicleId/" . $id;
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => 'something'
            ));
            $image = curl_exec($curl);
            curl_close($curl);
            if ($image !== FALSE) {
                echo $image;
            } else {
                echo null;
            }
        } else {
            echo null;
        }
    } else {
        echo null;
    }
} else {
    echo null;
}