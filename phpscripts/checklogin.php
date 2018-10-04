<?php
/**
 * Created by PhpStorm.
 * User: benehiko
 * Date: 2018/10/04
 * Time: 2:18 PM
 */


ini_set('display_errors', 'On');

session_start();

if ((isset($_COOKIE['acs_login'])) && (!empty($_COOKIE['acs_login']))) {
    echo $_COOKIE['acs_login'];
} else if (isset($_SESSION['loggedin'])) {
    echo $_SESSION['username'];
} else {
    echo "LoggedOut";
}
