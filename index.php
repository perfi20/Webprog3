<?php
// config fileok betöltése
require('config/config.php');
require('config/dbconn.php');

// sql lekérdezés
$sql = $query = 'SELECT * FROM webprog_hirek';
$result = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

include('inc/header.php');   

// bejelentkezett státusz ellenőrzése
// if (isset($_SESSION['user_name'])) {
//     header('location:login_form.php');
// }

?>

<!-- összes post megjelenítése -->
<?php foreach($posts as $post) : ?>
    <div class="container">
        <div class="content">
            <div class="card text-center bg-light border border-2 shadow p-3 mb-4 bg-body rounded">
                <div class="card-header"><?php echo $post['groupName']; ?></div>
                <div class="card-body">
                    <h2 class="card-title"><?php echo $post['title']; ?></h2>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $post['tags']; ?></h6>
                    <h6 class="card-subtitle text-muted"><small>Létrehozva <?php echo $post['published']; ?>, szerző: <?php echo $post['author']; ?></small></h6>
                    <p class="card-text lh-lg d-inline-block text-truncate text-justify" style="max-width: 300px;"><?php echo $post['body']; ?></p>
                    <br>
                    <a class="card-link btn btn-info rounded-pill mb-2" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['hirID']; ?>">Olvasd tovább</a>
                    <div class="card-footer text-muted"><?php echo round((time() - strtotime($post['published'])) / (60 * 60 * 24)); ?> napja</div>
                </div>
            </div>
        </div>
    </div>
    
<?php endforeach; ?>

<?php include('inc/footer.php'); ?>

