<?php

// session bontása, átirányítás
session_start();

$_SESSION['user_name'] = null;
$_SESSION = array();
unset($_COOKIE['PHPSESSID']);
session_destroy();

header('location:login_form.php');
die;
?>