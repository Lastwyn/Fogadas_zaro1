<?php
include('database.php');
session_start();
if (isset($_SESSION['felhasz_id']) ? $_SESSION['felhasz_id'] = $db->security($_SESSION['felhasz_id']) : $_SESSION['felhasz_id'] = "") {
  $sql2 = "SELECT egyenleg FROM penztarca WHERE felhasz_id = " . $_SESSION['felhasz_id'] . ";";

  $result2 = $db->RunSQL($sql2);

  $sql1 = "SELECT DISTINCT `fogadasi_osszeg`,`profit_buko`, fogadas.meccs_id , fogadas.fogadasi_szam,fogadas.eredmeny, fogadas_neve, odds, hazai_id, vendeg_id FROM fogadas INNER JOIN fogadasi_lehetoseg ON fogadasi_lehetoseg.fogadasi_szam = fogadas.fogadasi_szam INNER JOIN meccs_eredmeny ON meccs_eredmeny.meccs_id = fogadas.meccs_id INNER JOIN nemzetek ON nemzetek.nemzet_id = meccs_eredmeny.hazai_id OR nemzetek.nemzet_id = meccs_eredmeny.vendeg_id WHERE felhasz_id = '" . $_SESSION['felhasz_id'] . "' AND lefutott_e = 0 ORDER BY fog_id DESC;";
  $result1 = $db->RunSQL($sql1);

  $sql = "SELECT DISTINCT `fogadasi_osszeg`,`profit_buko`, fogadas.meccs_id , fogadas.fogadasi_szam,fogadas.eredmeny, fogadas_neve, odds, hazai_id, vendeg_id FROM fogadas INNER JOIN fogadasi_lehetoseg ON fogadasi_lehetoseg.fogadasi_szam = fogadas.fogadasi_szam INNER JOIN meccs_eredmeny ON meccs_eredmeny.meccs_id = fogadas.meccs_id INNER JOIN nemzetek ON nemzetek.nemzet_id = meccs_eredmeny.hazai_id OR nemzetek.nemzet_id = meccs_eredmeny.vendeg_id WHERE felhasz_id = '" . $_SESSION['felhasz_id'] . "' AND lefutott_e = 1 ORDER BY fog_id DESC LIMIT 5;";
  $result = $db->RunSQL($sql);

}

?>
<!DOCTYPE html>
<html lang="hu">

<head>
  <title>Tutifix</title>
  <link rel = "icon" href = "betting.ico"  type = "image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="kinezet.css?<?php echo time(); ?>" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,300;1,400&display=swap" rel="stylesheet">


</head>

<body>
  <div id="refresh">
  <div class="container">
    <div class="row">
      <header>
        <h1>Tutifix fogadó oldal</h1>
        <nav>
          <ul>
            <li><a href="Foldal.php" class="navbutton">Home</a></li>
            <?php
            if (isset($_SESSION['felhasz_id']) ? $_SESSION['felhasz_id'] = $db->security($_SESSION['felhasz_id']) : $_SESSION['felhasz_id'] = "") { ?>

              <li><a href="fogadasok.php" class="navbutton">Fogadásaim</a></li>
            <?php } ?>
            <?php if (isset($_SESSION['felhasz_nev'])): ?>

              <li><a href="logout.php" role="button" class="navbutton">Kijelentkezés</a></li>
              <li><a href="penztarca.php" class="navbutton">Pénztárca</a></li>
              <?php while ($row = $result2->fetch_assoc()): ?>
                <li>
                  <?= $row['egyenleg']; ?>Ft
                </li>
              <?php endwhile; ?>
              <li>
                <?= $_SESSION['felhasz_nev']; ?>
              </li>
            <?php else: ?>
              <li><a href="register.php" class="navbutton">Regisztráció</a></li>
              <li><a href="login.php" class="navbutton">Bejelentkezés</a></li>
            <?php endif; ?>

          </ul>
        </nav>
      </header>
    </div>
  </div>