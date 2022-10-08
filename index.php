<?php
    require('config/config.php');
    require('config/dbconn.php');

    $query = 'SELECT * FROM hirek';
    $result = mysqli_query($conn, $query);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>

    <a href="newPost.php" class="btn btn-primary">Új hír létrehozása</a>

<?php foreach($posts as $post) : ?>
    <div class="container">
        <h3><?php echo $post['title']; ?></h3>
        <h6><?php echo $post['tags']; ?></h6>
        <small>Created on <?php echo $post['published']; ?> by <?php echo $post['author']; ?></small>
        <p><?php echo $post['body']; ?></p>
        <a class="btn btn-default" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['hirID']; ?>">Read More</a>
    </div>
<?php endforeach; ?>

<?php include('inc/footer.php'); ?>
