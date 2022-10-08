<?php

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// $db = [
//     'dbHost' => DB_HOST,
//     'dbUser' => DB_USER,
//     'dbPass' => DB_PASS,
//     'dbName' => DB_NAME
// ];

if (mysqli_connect_errno()) {
    echo 'Adatbázishoz való csatlakozás sikertelen'. mysqli_connect_errno();
}