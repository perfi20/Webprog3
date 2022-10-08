<?php

$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli("localhost", "root", "", 80);
echo($username);
echo($password);
if($conn->connection_error){
    die("Connection failed: " + $conn->connection_error);
}

$sql = "INSERT INTO test (username, password)
VALUES ('" . $username . "', '" . $password . "')";

if ($conn->query($sql) === TRUE) {
    echo "Sikeres generálás!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>