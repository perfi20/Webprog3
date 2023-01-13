<?php

// config fileok betöltése
require('config/config.php');
require('config/dbconn.php');

// sql lekérdezés keresés alapján
if(isset($_POST['submit2'])) {

        $tags = $_REQUEST['tags'];
        $query = "SELECT * FROM webprog_hirek
            WHERE tags LIKE '%$tags%'";
}else if (isset($_POST['submit'])) {

        $author = $_REQUEST['author'];
        $query = "SELECT * FROM webprog_hirek
            WHERE author LIKE '%$author%'";

} else $sql = $query = 'SELECT * FROM webprog_hirek';


$result = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>

<!-- keresés felhasználó és kulcsszó alapján -->
<div class="container">
<br>
    <form class="row row-cols-lg-auto g-3 align-items-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="row">
            <label class="form-label">Keresés: </label>
            <div class="col form-floating">
                <input class="form-control" type="text" name="author" placeholder="felhasználó">
                <label class="form-label">Szerző</label>
            </div>
            <div class="col">
                <input class="form-control btn btn-primary" type="submit" value="keresés" name="submit">
                <label class="form-label"></label>
            </div>
        </div>
    </form>
<br>
    <form class="row row-cols-lg-auto g-3 align-items-center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="row">
            <div class="col form-floating">
                <input class="form-control" type="text" name="tags" placeholder="kulcsszavak">
                <label class="form-label">Kulcsszó</label>
            </div>
            <div class="col">
                <input class="form-control btn btn-primary" type="submit" value="keresés" name="submit2">
                <label class="form-label"></label>
            </div>
        </div>
    </form>
<br>
</div>

<!-- 30 napnál régebbi posztok megjelenítése -->
<?php foreach($posts as $post) : ?>
    <?php if ((round((time() - strtotime($post['published'])) / (60 * 60 * 24))) > 30) : ?>
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
    <?php endif; ?>
<?php endforeach; ?>


<?php include('inc/footer.php'); ?>
