<?php
/**
 * Created by PhpStorm.
 * User: benehiko
 * Date: 2018/10/04
 * Time: 11:02 PM
 */
session_start();
if ((isset($_COOKIE['acs_login'])) && (!empty($_COOKIE['acs_login'])) || ($_SESSION['loggedin'] == true)) {
    setcookie('acs_login', "", time() - 3600);
    unset($_SESSION['loggedin']);

    echo "true";
} else {
    echo "false";
}