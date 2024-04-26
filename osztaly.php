<?php
include 'config.php';
session_start();

$isAdmin = false; 
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $result = mysqli_query($conn, "SELECT * FROM dolgozo WHERE `céges azonosító` = '$user_id'");
    $user = mysqli_fetch_assoc($result);

    if ($user && $user['isAdmin'] == 1) {
        $isAdmin = true; 
    }
}

if (isset($_POST['submit'])) {
  $osztalynev = mysqli_real_escape_string($conn, $_POST['osztalynev']);
  $feladata = mysqli_real_escape_string($conn, $_POST['feladata']);
  $osztalyvezeto = mysqli_real_escape_string($conn, $_POST['osztalyvezeto']);

  $check = mysqli_query($conn, "SELECT * FROM osztaly WHERE osztálynév = '$osztalynev'");
  if (mysqli_num_rows($check) > 0) {
    echo "<div class='error'>Az osztály már létezik.</div>";
  } else {
      mysqli_query($conn, "INSERT INTO osztaly (osztálynév, feladata, osztályvezető) VALUES ('$osztalynev', '$feladata', '$osztalyvezeto')") or die(mysqli_error($conn));
      echo "<div class='success'>Az osztály sikeresen hozzáadva.</div>";
    }
}

if (isset($_POST['changeOsztalyvezeto'])) {
  $selectedOsztaly = mysqli_real_escape_string($conn, $_POST['selectedOsztaly']);
  $newOsztalyvezeto = mysqli_real_escape_string($conn, $_POST['newOsztalyvezeto']);

  mysqli_query($conn, "UPDATE osztaly SET osztályvezető = '$newOsztalyvezeto' WHERE osztálynév = '$selectedOsztaly'") or die(mysqli_error($conn));
  echo "<div class='success'>Az osztályvezető sikeresen megváltozott.</div>";
}

if ($isAdmin && isset($_POST['deleteOsztaly'])) {
  $selectedOsztalyToDelete = mysqli_real_escape_string($conn, $_POST['selectedOsztalyToDelete']);
  mysqli_query($conn, "DELETE FROM osztaly WHERE osztálynév = '$selectedOsztalyToDelete'") or die(mysqli_error($conn));
  echo "<div class='success'>Az osztály sikeresen törölve.</div>";
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
    <div class="profile">
        <?php if ($isAdmin): ?>
        <form action="" method="post">
            <h2>Új osztály hozzáadása</h2>
            <label for="osztalynev">Osztálynév:</label>
            <input type="text" id="osztalynev" name="osztalynev" required><br><br>

            <label for="feladata">Feladata:</label>
            <input type="text" id="feladata" name="feladata" required><br><br>

            <label for="osztalyvezeto">Osztályvezető:</label>
            <input type="text" id="osztalyvezeto" name="osztalyvezeto" required><br><br>

            <input type="submit" name="submit" value="Hozzáadás">
        </form>
        <?php endif; ?>

        <?php if ($isAdmin): ?>
    <form action="" method="post">
        <h2>Osztályvezető módosítása</h2>

        <label for="selectedOsztaly">Osztály:</label>
        <select id="selectedOsztaly" name="selectedOsztaly" required>
            <?php 
            $osztalyok = mysqli_query($conn, "SELECT osztálynév FROM osztaly");
            while ($osztaly = mysqli_fetch_assoc($osztalyok)) {
                echo "<option value='" . $osztaly['osztálynév'] . "'>" . $osztaly['osztálynév'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="newOsztalyvezeto">Új osztályvezető:</label>
        <input type="text" id="newOsztalyvezeto" name="newOsztalyvezeto" required><br><br>

        <input type="submit" name="changeOsztalyvezeto" value="Módosítás">
    </form>
<?php endif; ?>

<?php if ($isAdmin): ?>
    <form action="" method="post">
        <h2>Osztály törlése</h2>

        <label for="selectedOsztalyToDelete">Osztály:</label>
        <select id="selectedOsztalyToDelete" name="selectedOsztalyToDelete" required>
            <?php 
            $osztalyok = mysqli_query($conn, "SELECT osztálynév FROM osztaly");
            while ($osztaly = mysqli_fetch_assoc($osztalyok)) {
                echo "<option value='" . $osztaly['osztálynév'] . "'>" . $osztaly['osztálynév'] . "</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="deleteOsztaly" value="Törlés">
    </form>
<?php endif; ?>
        </div>
    </div>
    </main>
  </body>
</html>