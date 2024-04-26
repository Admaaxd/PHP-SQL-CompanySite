<?php
include 'config.php';
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $result = mysqli_query($conn, "SELECT * FROM dolgozo WHERE `céges azonosító` = '$user_id'");
    $user = mysqli_fetch_assoc($result);

    $isAdmin = $user['isAdmin'];
} else {
    $isAdmin = false;
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
    <main>
    <div class="fiokmain">
      <section class="mainsect">
        <h2 class="maincaption" style="color:white;">ÜDVÖZÖLJÜK VÁLLALATUNK HONLAPJÁN!</h2>
      </section>
    </div>
    </main>
  </body>
</html>