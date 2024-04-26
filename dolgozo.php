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

if (isset($_POST['deleteDolgozo'])) {
    $dolgozoToDelete = mysqli_real_escape_string($conn, $_POST['dolgozoToDelete']);

    $check = mysqli_query($conn, "SELECT * FROM dolgozo WHERE `céges azonosító` = '$dolgozoToDelete'");
    if (mysqli_num_rows($check) == 0) {
        echo "<div class='error'>Nincs ilyen azonosítójú dolgozó.</div>";
    } else {

        if ($dolgozoToDelete != '') {
            $query = "DELETE FROM dolgozo WHERE `céges azonosító` = '$dolgozoToDelete'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<div class='success'>A dolgozó sikeresen törölve.</div>";
            } else {
                echo "<div class='error'>Hiba történt a törlés során.</div>";
            }
        }
    }
}

if (isset($_POST['changeDolgozoFizetes'])) {
  $selectedDolgozo = mysqli_real_escape_string($conn, $_POST['selectedDolgozo']);
  $newDolgozoFizetes = mysqli_real_escape_string($conn, $_POST['newDolgozoFizetes']);

  mysqli_query($conn, "UPDATE dolgozo SET fizetés = '$newDolgozoFizetes' WHERE `céges azonosító` = '$selectedDolgozo'") or die(mysqli_error($conn));
  echo "<div class='success'>A fizetés sikeresen megváltozott.</div>";
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
        <h2>Dolgozó törlése</h2>

        <label for="dolgozoToDelete">Dolgozó azonosító:</label>
        <input type="text" id="dolgozoToDelete" name="dolgozoToDelete" required><br><br>

        <input type="submit" name="deleteDolgozo" value="Törlés">
    </form>
<?php endif; ?>






<?php if ($isAdmin): ?>
    <form action="" method="post">
        <h2>Fizetés módosítása</h2>

        <label for="selectedDolgozo">Céges azonosító:</label>
        <select id="selectedDolgozo" name="selectedDolgozo" required>
            <?php 
            $dolgozok = mysqli_query($conn, "SELECT `céges azonosító` FROM dolgozo");
            while ($dolgozo = mysqli_fetch_assoc($dolgozok)) {
                echo "<option value='" . $dolgozo['céges azonosító'] . "'>" . $dolgozo['céges azonosító'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="newDolgozoFizetes">Új fizetés:</label>
        <input type="text" id="newDolgozoFizetes" name="newDolgozoFizetes" required><br><br>

        <input type="submit" name="changeDolgozoFizetes" value="Módosítás">
    </form>
<?php endif; ?>

        </div>
    </div>
    </main>
  </body>
</html>