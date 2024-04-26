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
  $reszlegnev = mysqli_real_escape_string($conn, $_POST['reszlegnev']);
  $feladata = mysqli_real_escape_string($conn, $_POST['feladata']);
  $reszlegvezeto = mysqli_real_escape_string($conn, $_POST['reszlegvezeto']);
  $osztalynev = mysqli_real_escape_string($conn, $_POST['osztalynev']);

  $check = mysqli_query($conn, "SELECT * FROM reszleg WHERE részlegnév = '$reszlegnev'");
  if (mysqli_num_rows($check) > 0) {
    echo "<div class='error'>A részleg már létezik.</div>";
  } else {
      mysqli_query($conn, "INSERT INTO reszleg (részlegnév, feladata, részlegvezető, osztálynév) VALUES ('$reszlegnev', '$feladata', '$reszlegvezeto', '$osztalynev')") or die(mysqli_error($conn));
      echo "<div class='success'>A részleg sikeresen hozzáadva.</div>";
    }
}

if (isset($_POST['changeReszlegvezeto'])) {
  $selectedReszleg = mysqli_real_escape_string($conn, $_POST['selectedReszleg']);
  $newReszlegvezeto = mysqli_real_escape_string($conn, $_POST['newReszlegvezeto']);

  mysqli_query($conn, "UPDATE reszleg SET részlegvezető = '$newReszlegvezeto' WHERE részlegnév = '$selectedReszleg'") or die(mysqli_error($conn));
  echo "<div class='success'>A részlegvezető sikeresen megváltozott.</div>";
}

if ($isAdmin && isset($_POST['deleteReszleg'])) {
  $selectedReszlegToDelete = mysqli_real_escape_string($conn, $_POST['selectedReszlegToDelete']);
  mysqli_query($conn, "DELETE FROM reszleg WHERE részlegnév = '$selectedReszlegToDelete'") or die(mysqli_error($conn));
  echo "<div class='success'>A részleg sikeresen törölve.</div>";
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
            <h2>Új részleg hozzáadása</h2>
            <label for="reszlegnev">Részlegnév:</label>
            <input type="text" id="reszlegnev" name="reszlegnev" required><br><br>

            <label for="feladata">Feladata:</label>
            <input type="text" id="feladata" name="feladata" required><br><br>

            <label for="reszlegvezeto">Részlegvezető:</label>
            <input type="text" id="reszlegvezeto" name="reszlegvezeto" required><br><br>

            <label for="osztalynev">Osztálynév:</label>
            <input type="text" id="osztalynev" name="osztalynev" required><br><br>

            <input type="submit" name="submit" value="Hozzáadás">
        </form>
        <?php endif; ?>

        <?php if ($isAdmin): ?>
    <form action="" method="post">
        <h2>Részlegvezető módosítása</h2>

        <label for="selectedReszleg">Részleg:</label>
        <select id="selectedReszleg" name="selectedReszleg" required>
            <?php 
            $reszlegek = mysqli_query($conn, "SELECT részlegnév FROM reszleg");
            while ($reszleg = mysqli_fetch_assoc($reszlegek)) {
                echo "<option value='" . $reszleg['részlegnév'] . "'>" . $reszleg['részlegnév'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="newReszlegvezeto">Új részlegvezető:</label>
        <input type="text" id="newReszlegvezeto" name="newReszlegvezeto" required><br><br>

        <input type="submit" name="changeReszlegvezeto" value="Módosítás">
    </form>
<?php endif; ?>

<?php if ($isAdmin): ?>
    <form action="" method="post">
        <h2>Részleg törlése</h2>

        <label for="selectedReszlegToDelete">Részleg:</label>
        <select id="selectedReszlegToDelete" name="selectedReszlegToDelete" required>
            <?php 
            $reszlegek = mysqli_query($conn, "SELECT részlegnév FROM reszleg");
            while ($reszleg = mysqli_fetch_assoc($reszlegek)) {
                echo "<option value='" . $reszleg['részlegnév'] . "'>" . $reszleg['részlegnév'] . "</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" name="deleteReszleg" value="Törlés">
    </form>
<?php endif; ?>

        </div>
    </div>
    </main>
  </body>
</html>