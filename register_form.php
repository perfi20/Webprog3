<?php

// config fileok betöltése
require('config/config.php');
require('config/dbconn.php');

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

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO webprog_felhasz_adatok(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="center">

<!-- regisztrációs űrlap -->
   <form action="" method="post">
      <h1>Regisztáció</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="txt_field">
      <input type="text" name="name" required placeholder="név">
      </div>
      <div class="txt_field">
      <input type="email" name="email" required placeholder="email">
      </div>

      <div class="txt_field">
      <input type="password" name="password" required placeholder="jelszó">
      </div>

      <div class="txt_field">
      <input type="password" name="cpassword" required placeholder="jelszó megerősítése">
      </div>
      <input type="submit" name="submit" value="regisztráció" class="form-btn">
      <p>Van már fiókod?<a href="login_form.php">Bejelentkezés</a></p>
   </form>

</div>

</body>
</html>