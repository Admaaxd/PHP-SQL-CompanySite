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
  $projektnev = mysqli_real_escape_string($conn, $_POST['projektnev']);
  $hatarido = mysqli_real_escape_string($conn, $_POST['hatarido']);
  $leiras = mysqli_real_escape_string($conn, $_POST['leiras']);
  $projektvezeto = mysqli_real_escape_string($conn, $_POST['projektvezeto']);

  $check = mysqli_query($conn, "SELECT * FROM projekt WHERE projektnév = '$projektnev'");
  if (mysqli_num_rows($check) > 0) {
    echo "<div class='error'>A projekt már létezik.</div>";
  } else {
      mysqli_query($conn, "INSERT INTO projekt (projektnév, határidő, leírás, projektvezető) VALUES ('$projektnev', '$hatarido', '$leiras' ,'$projektvezeto')") or die(mysqli_error($conn));
      echo "<div class='success'>A projekt sikeresen hozzáadva.</div>";
    }
}


if (isset($_POST['writeReport'])) {
  $projektnev = mysqli_real_escape_string($conn, $_POST['projektnev']);
  $beszamolo = mysqli_real_escape_string($conn, $_POST['beszamolo']);

  $check = mysqli_query($conn, "SELECT * FROM dolgozo_projekt WHERE projektnév = '$projektnev' AND `céges azonosító` = '$user_id'");
  if (mysqli_num_rows($check) > 0) {
      mysqli_query($conn, "UPDATE dolgozo_projekt SET beszámoló = '$beszamolo' WHERE projektnév = '$projektnev' AND `céges azonosító` = '$user_id'") or die(mysqli_error($conn));
      echo "<div class='success'>A beszámoló sikeresen frissítve.</div>";
  } else {
      echo "<div class='error'>Nincs ilyen projektnév vagy nincs hozzárendelve a dolgozóhoz.</div>";
  }
}


if (isset($_POST['listWorkers'])) {
  $selectedProject = mysqli_real_escape_string($conn, $_POST['selectedProject']);
  $workers = mysqli_query($conn, "SELECT dolgozo.név FROM dolgozo INNER JOIN dolgozo_projekt ON dolgozo.`céges azonosító` = dolgozo_projekt.`céges azonosító` WHERE dolgozo_projekt.projektnév = '$selectedProject' ORDER BY dolgozo.név ASC");
}







$query = "
    SELECT 
        dolgozo.*,
        IFNULL(osztaly.osztálynév, 'Nem osztályvezető') as osztálynév,
        IFNULL(osztaly.feladata, 'N/A') as feladata
    FROM 
        dolgozo
    LEFT JOIN 
        osztaly ON dolgozo.`céges azonosító` IN (SELECT `osztályvezető` FROM osztaly)
    WHERE 
        dolgozo.fizetés = (SELECT MAX(dolgozo.fizetés) FROM dolgozo)";

$result = mysqli_query($conn, $query);
$highestPaidEmployee = mysqli_fetch_assoc($result);




$query2 = "
    SELECT 
        projekt.projektnév,
        dolgozo.név AS dolgozonev,
        dolgozo.email
    FROM 
        projekt
    JOIN 
        dolgozo_projekt ON projekt.projektnév = dolgozo_projekt.projektnév
    JOIN 
        dolgozo ON dolgozo_projekt.`céges azonosító` = dolgozo.`céges azonosító`
    WHERE 
        projekt.határidő < CURDATE() AND (dolgozo_projekt.beszámoló IS NULL OR dolgozo_projekt.beszámoló = '')";

$result2 = mysqli_query($conn, $query2);
$missingReports = mysqli_fetch_all($result2, MYSQLI_ASSOC);



$query3 = "
    SELECT AVG(dolgozo.fizetés) as avgSalary
    FROM dolgozo
    INNER JOIN reszleg ON dolgozo.`céges azonosító` = reszleg.részlegvezető";
$result3 = mysqli_query($conn, $query3);
$avgSalaryData = mysqli_fetch_assoc($result3);
$avgSalary = number_format($avgSalaryData['avgSalary'], 2);
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
    <div class="projektmain">
    <div class="profile2">
        <?php if ($isAdmin): ?>
        <form action="" method="post">
            <h2>Új projekt hozzáadása</h2>
            <label for="projektnev">Projektnév:</label>
            <input type="text" id="projektnev" name="projektnev" required><br><br>

            <label for="hatarido">Határidő:</label>
            <input type="text" id="hatarido" name="hatarido" required><br><br>

            <label for="leiras">Leírás:</label>
            <input type="text" id="leiras" name="leiras" required><br><br>

            <label for="projektvezeto">Projektvezető:</label>
            <input type="text" id="projektvezeto" name="projektvezeto" required><br><br>

            <input type="submit" name="submit" value="Hozzáadás">
        </form>
        <?php endif; ?>

        <?php if (!$isAdmin && isset($user_id)): ?>
    <form action="" method="post">
        <h2>Beszámoló írása</h2>
        <label for="projektnev">Projektnév:</label>
        <input type="text" id="projektnev" name="projektnev" required><br><br>

        <label for="beszamolo">Beszámoló:</label>
        <textarea id="beszamolo" name="beszamolo" required></textarea><br><br>

        <input type="submit" name="writeReport" value="Beszámoló írása">
    </form>
    <?php endif; ?>



    <?php if ($isAdmin && isset($user_id)): ?>
<form action="" method="post">
    <h2>Dolgozók listázása projekt alapján</h2>
    <label for="selectedProject">Projektnév:</label>
    <input type="text" id="selectedProject" name="selectedProject" required><br><br>

    <input type="submit" name="listWorkers" value="Dolgozók listázása">
</form>


<?php 
if (isset($_POST['listWorkers']) && mysqli_num_rows($workers) > 0) {
    echo "<h3>A kiválasztott projektben dolgozó/dolgozók:</h3>";
    echo "<ul>";
    while ($worker = mysqli_fetch_assoc($workers)) {
        echo "<li>" . htmlspecialchars($worker['név']) . "</li>";
    }
    echo "</ul>";
} elseif (isset($_POST['listWorkers'])) {
    echo "<p>Nincsen dolgozó/dolgozók a kiválasztott projektben.</p>";
}
?>
<?php endif; ?>




<?php if ($isAdmin && isset($user_id)): ?>
<?php if (isset($highestPaidEmployee)): ?>
    <div class="highestPaidEmployee">
        <h2>A legnagyobb fizetésű dolgozó adatai:</h2>
        <p>Név: <?= htmlspecialchars($highestPaidEmployee['név']); ?></p>
        <p>Fizetés: <?= htmlspecialchars($highestPaidEmployee['fizetés']); ?> Ft</p>
        <p>Osztálynév: <?= htmlspecialchars($highestPaidEmployee['osztálynév']); ?></p>
        <p>Osztály feladata: <?= htmlspecialchars($highestPaidEmployee['feladata']); ?></p>
    </div>
    <?php endif; ?>
    <?php endif; ?>




    <?php if ($missingReports): ?>
    <div class="missingReports">
        <h2>Lejárt határidejű projektek, ahol a dolgozók még nem írtak beszámolót:</h2>
        <table>
            <thead>
                <tr>
                    <th>Projekt név</th>
                    <th>Dolgozó neve</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($missingReports as $report): ?>
                    <tr>
                        <td><?= htmlspecialchars($report['projektnév']); ?></td>
                        <td><?= htmlspecialchars($report['dolgozonev']); ?></td>
                        <td><?= htmlspecialchars($report['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php if ($isAdmin && isset($user_id)): ?>
<?php ?>
    <div class="avgSalary">
        <h2>A részlegvezetők átlagfizetése:</h2>
        <p><?= htmlspecialchars($avgSalary); ?> Ft</p>
    </div>
<?php?>
<?php endif; ?>
        </div>
    </div>
    </main>
  </body>
</html>