<?php


if ($_POST['registration'] == "" || $_POST['color'] == "" || $_POST['model'] == "") {

    echo "error: all fields are required";

} else {

    echo "AddVehicle.php is being called ";
    echo "</br>";
    echo "</br>";
    echo("Registration: " . $_POST["registration"]);
    echo "</br>";
    echo("Color: " . $_POST["color"]);
    echo "</br>";
    echo("Model: " . $_POST["model"]);
}
