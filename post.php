<?php 

// config fájlok betöltése
require('config/config.php');
require('config/dbconn.php');

// id lekérése a kérésből
$id = mysqli_real_escape_string($conn, $_GET['id']);

// sql lekérdezés
$query = "SELECT * FROM webprog_hirek WHERE hirID = '$id'";

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

<!-- postok megjelenítése szűrés alapján -->
<div class="container">
    <div class="text-center">
        <h1><?php echo $post['title']; ?></h1>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $post['tags']; ?></h6>
        <small>Létrehozva <?php echo $post['published']; ?>, szerző: <?php echo $post['author']; ?></small>
        <p><?php echo $post['body']; ?></p>
    </div>
    <a class="btn btn-default" href="<?php echo ROOT_URL; ?>">Vissza</a>
</div>

<?php include('inc/footer.php');