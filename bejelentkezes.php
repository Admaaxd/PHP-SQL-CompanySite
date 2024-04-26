<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

    $identifier = mysqli_real_escape_string($conn, $_POST['identifier']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `dolgozo` WHERE email = '$identifier' OR név = '$identifier' OR telefon = '$identifier' AND jelszó = '$pass'") or die('A lekérdezés sikertelen!');

    if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['céges azonosító'];
        header('location:fiok.php');
        exit();
    } else {
        $message[] = 'Hibás azonosító vagy jelszó!';
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

<form action="" method="post" enctype="multipart/form-data" class="belepes">
   <h3>Bejelentkezés</h3>
   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message">'.$message.'</div>';
      }
   }
   ?> 
   <input type="text" name="identifier" placeholder="Email, Név vagy Telefonszám" class="input" required>
   <input type="password" name="password" placeholder="Jelszó" class="input" required>
   <input type="submit" name="submit" value="Bejelentkezés" class="btn" style="background-color:rgb(176, 255, 200);  width: 100%; border-radius: 5px; padding:10px 30px; color:black; font-weight:bolder; display: block; text-align: center; cursor: pointer; font-size: 15px; margin-top: 10px;">
   <p style="margin-top: 0px; font-size: 20px; font-weight: bolder; margin-bottom: 0px;">Még nincs fiókja?  <a href="reg.php" class="marvanfiokja"> Regisztrálj most!</a></p>
</form>

</div>
    
  </body>
</html>

