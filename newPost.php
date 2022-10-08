<?php 

    require('config/config.php');
    require('config/dbconn.php');

    if (isset($_POST['submit'])) {
        $group = mysqli_real_escape_string($conn, $_POST['group']);
        $tags = mysqli_real_escape_string($conn, $_POST['tags']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $published = mysqli_real_escape_string($conn, $_POST['published']);
        $author = 'teszt';
        // szerző $_SESSION[]-ből login után ?
        
        // $group = $_POST['group'];
        // $tags = 'teszt2';
        // $title = 'teszt2';
        // $body = 'teszt2';
        // $published = 'teszt2';
        // $author = 'teszt2';

        //$conn2 = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $query = "INSERT INTO `hirek`
            (groupName, tags, published, title, body, author)
            VALUES('$group', '$tags', '$published', '$title', '$body', '$author')";


        // if ($conn2->query($query) === TRUE) {
        //     echo "Sikeres generálás!";
        // } else {
        //     echo "Error: " . $query . "<br>" . $conn2->error;
        // }
        // $conn2->close();

        if (mysqli_query($conn, $query)) {
            header('Location: '.ROOT_URL.'');
        } else {
            echo 'ERROR: '.mysqli_error($conn);
        }

    }
?>


<?php include('inc/header.php'); ?>

<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <br>
        <div class="form-group">
            <label class="form-label">Csoport: </label>
            <select class="form-control form-select" name="group">
                <option selected>Nincs</option>
                <option value="teszt">teszt</option>
                <!-- optionokbe csoportokat valahogy bevarázsolni -->
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
        <input class="form-control btn btn-primary" type="submit" value="submit" name="submit">
        <a class="btn btn-default" href="<?php echo ROOT_URL; ?>">Vissza</a>
    </form>
</div>

<?php include('inc/footer.php'); ?>