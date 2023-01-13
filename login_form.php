<?php

// config fileok betöltése
require('config/config.php');
require('config/dbconn.php');

// session indítása
session_start();

// sql lekérdezés
if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = " SELECT * FROM webprog_felhasz_adatok WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   // felhasználó ellenőrzése
   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      // átiránytás sikeres belépés esetén
      $_SESSION['user_name'] = $row['name'];
      header('location:index.php');
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
   
<div class="container">
   <div class="center">

   <!-- bejelentkezés űrlap -->
      <form action="" method="post">
         <h1>bejelentkezés</h1>
         <?php
         // hibakezelés
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <div class="txt_field">
            <input type="email" name="email" required placeholder="email-cím">
         </div>
         <div class="txt_field">
            <input type="password" name="password" required placeholder="jelszó">
         </div>
         <div class="txt_field">
            <input type="submit" name="submit" value="Bejelentkezés" class="form-btn">
         </div>
            <div class="signup_link">
            Nincs még felhasználód? <a href="register_form.php">Regisztráció</a>
         </div>
      </form>
   </div>
</div>
</body>
</html>