<?php 

// config fileok betöltése
require('config/config.php');
require('config/dbconn.php');

include('inc/header.php');

// sql lekérdezés
    if (isset($_POST['submit'])) {
        $group = mysqli_real_escape_string($conn, $_POST['group']);
        $tags = mysqli_real_escape_string($conn, $_POST['tags']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $published = mysqli_real_escape_string($conn, $_POST['published']);
        $author = $_SESSION['user_name'];
        
        $query = "INSERT INTO `webprog_hirek`
            (groupName, tags, published, title, body, author)
            VALUES('$group', '$tags', '$published', '$title', '$body', '$author')";


        if (mysqli_query($conn, $query)) {
            header('Location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }

    }
?>

<!-- új post form -->
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <br>
        <div class="form-group">
            <label class="form-label">Csoport: </label>
            <select class="form-control form-select" name="group">
                <option selected>Nincs</option>
                <option value="gasztronomia">gasztronómia</option>
                <option value="sport">sport</option>
                <option value="politika">politika</option>
                <option value="gazdasag">gazdaság</option>
                <option value="tech">tech</option>
                <option value="egyeb">egyéb</option>
            </select>
        </div>
        <br>
        <div class="form-floating">
            <input class="form-control" type="text" name="tags" placeholder="kulcsszavak">
            <label class="form-label">Kulcsszavak, vesszővel elválasztva: </label>
        </div>
        <br>
        <div class="form-floating">
            <input class="form-control" type="text" name="title" placeholder="cím">
            <label class="form-label">Cím: </label>
        </div>
        <br>
        <div class="form-floating">
            <textarea class="form-control" name="body" cols="30" rows="5" placeholder="szöveg"></textarea>
            <label class="form-label">Szöveg: </label>
        </div>
        <br>
        <div class="form-floating">
            <input class="form-control" type="date" name="published" placeholder="dátum">
            <label class="form-label">Dátum: </label>
        </div>
        <br>
        <input class="form-control btn btn-primary" type="submit" value="küldés" name="submit">
        <a class="btn btn-default" href="<?php echo ROOT_URL; ?>">Vissza</a>
    </form>
</div>

<?php include('inc/footer.php'); ?>