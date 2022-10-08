<?php 

require('config/config.php');
require('config/dbconn.php');

// id lekérése a kérésből
$id = mysqli_real_escape_string($conn, $_GET['id']);

// sql lekérdezés
$query = "SELECT * FROM hirek WHERE hirID = '$id'";

// lekérdezés eredmény
$result = mysqli_query($conn, $query);

// eredmény asszociativ tombbe
$post = mysqli_fetch_assoc($result);

// eredmeny valtozo felszabaditasa
mysqli_free_result($result);

// kapcsolat bontása
mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
<div class="container">
    <a class="btn btn-default" href="<?php echo ROOT_URL; ?>">Vissza</a>
    <h1><?php echo $post['title']; ?></h1>
    <small>Created on <?php echo $post['published']; ?> by <?php echo $post['author']; ?> </small>
    <p><?php echo $post['body']; ?></p>
</div>

<?php include('inc/footer.php');