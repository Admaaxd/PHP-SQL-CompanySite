<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `dolgozo` WHERE email = '$email'") or die('A lekérdezés sikertelen!');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'Ez a felhasználó már létezik!'; 
   }else{
      if($pass != $cpass){
         $message[] = 'A jelszavak nem egyeznek!';
      }else{
         $result = mysqli_query($conn, "SELECT MAX(`céges azonosító`) as maxID FROM `dolgozo`");
         $row = mysqli_fetch_assoc($result);
         $corporateID = $row['maxID'] + 1;

         $salary = rand(10000, 150000);

         $insert = mysqli_query($conn, "INSERT INTO `dolgozo`(`céges azonosító`, email, név, telefon, fizetés, jelszó) 
         VALUES('$corporateID', '$email', '$name', '$phone', '$salary', '$pass')") or die('A lekérdezés sikertelen!');

         if($insert){
            $message[] = 'Sikeres regisztráció!';
            header('location:bejelentkezes.php');
         }else{
            $message[] = 'Sikertelen regisztráció!';
         }
      }
   }
}
$isAdmin = false;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $result = mysqli_query($conn, "SELECT * FROM dolgozo WHERE `céges azonosító` = '$user_id'");
    $user = mysqli_fetch_assoc($result);
    $isAdmin = $user['isAdmin'];
} 
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8">
    <title>Vállalat</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <header>
      
    <nav id="linklista">
    <h2><a href="index.php">FŐOLDAL</a></h2>
    <?php if ($isAdmin): ?>
        <h2><a href="osztaly.php">OSZTÁLY</a></h2>
        <h2><a href="reszleg.php">RÉSZLEG</a></h2>
    <?php endif; ?>
    <h2><a href="projekt.php">PROJEKT/INFORMÁCIÓK</a></h2>
    <?php if ($isAdmin): ?>
        <h2><a href="dolgozo.php">DOLGOZÓ</a></h2>
    <?php endif; ?>
    <h2><a href="fiok.php">FIÓK</a></h2>
</nav>
      <nav id="belepesregisztracionav">
        <ul id="belepesregisztracionavul">
            <li class="loginandregistration"><a href="bejelentkezes.php" class="belepesregisztracionaa">BELÉPÉS</a></li>
            <li class="loginandregistration"><a href="reg.php" class="belepesregisztracionaa">REGISZTRÁCIÓ</a></li>
           </ul>
      </nav>
    </header>
    <body>
      
    <div class="fiokmain">
<form class="belepes" action="" method="post" enctype="multipart/form-data">
   <h3>Regisztráció</h3>
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message">'.$message.'</div>';
      }
   }
   ?>
      <input type="text" name="name" placeholder="Teljes név" class="input" required>
   <input type="email" name="email" placeholder="E-Mail" class="input" required>
   <input type="text" name="phone" placeholder="Telefon" class="input" required>
   <input type="password" name="password" placeholder="Jelszó" class="input" required>
   <input type="password" name="cpassword" placeholder="Jelszó megerősítése" class="input" required>

   <input type="submit" name="submit" value="Regisztráció" style="background-color:rgb(176, 255, 200);  width: 100%; border-radius: 5px; padding:10px 30px; color:black; font-weight:bolder; display: block; text-align: center; cursor: pointer; font-size: 15px; margin-top: 10px;">
   <p style="margin-top: 0px; font-size: 20px; font-weight: bolder; margin-bottom: 0px;">Már van fiókja?  <a href="bejelentkezes.php" class="marvanfiokja"> Bejelentkezés</a></p>
</form>
</div>
  </body>
</html>

