<?php 

require('config/config.php');
require('config/dbconn.php');


$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "DELETE FROM hirek WHERE hirID = '$id'";

mysqli_query($conn, $query);
mysqli_close($conn);

header('Location:myPosts.php');
die;
