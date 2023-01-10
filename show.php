<?php

// config fileok betöltése
require('config/config.php');
require('config/dbconn.php');

// sql lekérdezés
$group = mysqli_real_escape_string($conn, $_GET['show']);

$query = "SELECT * FROM hirek WHERE groupName = '$group'";

$result = mysqli_query($conn, $query);

$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>

<!-- egy post megjelenítése id alapján -->
<?php foreach($posts as $post) : ?>

    <div class="container">
        <div class="card text-center bg-light border border-2 shadow p-3 mb-4 bg-body rounded">
            <div class="card-header"><?php echo $post['groupName']; ?></div>
            <div class="card-body">
                <h2 class="card-title"><?php echo $post['title']; ?></h2>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $post['tags']; ?></h6>
                <small>Létrehozva <?php echo $post['published']; ?>, szerző: <?php echo $post['author']; ?></small>
                <p class="card-text"><?php echo $post['body']; ?></p>
                <a class="card-link btn btn-info rounded-pill mb-2" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['hirID']; ?>">Olvasd tovább</a>
                <div class="card-footer text-muted"><?php echo round((time() - strtotime($post['published'])) / (60 * 60 * 24)); ?> napja</div>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<?php include('inc/footer.php'); ?>