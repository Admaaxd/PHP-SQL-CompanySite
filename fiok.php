<?php
include 'config.php';
session_start();


if(!isset($_SESSION['user_id'])){
  header('location:bejelentkezes.php');
  exit();
};

$user_id = $_SESSION['user_id'];

if(isset($_GET['kijelentkezes'])){
  session_destroy();
  header('location:bejelentkezes.php');
  exit();
}

$result = mysqli_query($conn, "SELECT * FROM dolgozo WHERE `céges azonosító` = '$user_id'");
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "A felhasználó nem található.";
    exit();
}

$isAdmin = $user['isAdmin'];
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
    <div class="profile">
    <?php if ($isAdmin): ?>
        <div>
            <h1>Üdvözöllek, Admin!</h1>
        </div>
    <?php else: ?>
        <div>
            <h1>Üdvözöllek, Dolgozó!</h1>
        </div>
    <?php endif; ?>
    <?php
$select = mysqli_query($conn, "SELECT * FROM `dolgozo` WHERE `céges azonosító` = '$user_id'") or die('A lekérdezés sikertelen!');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}
?>

<h2 style="text-align: center;"><?php echo $fetch['név'];?></h2>
<h2 style="text-align: center;"><?php echo $fetch['email'];?></h2>
    <a href="fiok.php?kijelentkezes=<?php echo $user_id;?>" class="fiokbtn">Kijelentkezés</a>
    </div>
  </div>
  </body>
</html>