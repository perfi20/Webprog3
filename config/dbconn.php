<?php

// adatbázis csatlakozás
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// hibakezelés
if (mysqli_connect_errno()) {
    echo 'Adatbázishoz való csatlakozás sikertelen'. mysqli_connect_errno();
}