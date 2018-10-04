<?php


if ($_POST['macaddress'] == "" || $_POST['gateno'] == "" ) {

    echo "error: all fields are required";

} else {

    echo "AddDevice.php is being called ";
    echo "</br>";
    echo "</br>";
    echo("Mac Address: " . $_POST["macaddress"]);
    echo "</br>";
    echo("Gate Number: " . $_POST["gateno"]);

}
