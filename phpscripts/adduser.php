<?php


if ($_POST['id'] == "" || $_POST['name'] == "" || $_POST['surname'] == "") {

    echo "error: all fields are required";

} else {

    echo "AddUser.php is being called ";
    echo "</br>";
    echo "</br>";
    echo("id: " . $_POST["id"]);
    echo "</br>";
    echo("name: " . $_POST["name"]);
    echo "</br>";
    echo("Surname: " . $_POST["surname"]);
}
