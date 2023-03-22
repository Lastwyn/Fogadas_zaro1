<?php 
include('database.php');
session_start();
if(isset($_SESSION['felhasz_id']) ? $_SESSION['felhasz_id'] = $db->security($_SESSION['felhasz_id']) : $_SESSION['felhasz_id'] = ""){
$sql2 = "SELECT egyenleg FROM penztarca WHERE felhasz_id = " .$_SESSION['felhasz_id'].";";

$result2 = $db->RunSQL($sql2);
}

?>
<!DOCTYPE html>
<html lang="hu">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="kinezet.css?<?php echo time(); ?>" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>
  <div class="container">
    <div class="row">
      <header>
        <h1>My Betting Site</h1>
        <nav>
          <ul>
            <li><a href="Foldal.php">Home</a></li>
            <li><a href="#">Sports Betting</a></li>
            
            <?php if(isset($_SESSION['felhasz_nev'])) : ?>
            
            <li><a href="logout.php" role="button">Kijelentkezés</a></li>
            <li><a href="penztarca.php">Pénztárca</a></li>
            <?php while ($row = $result2->fetch_assoc()) : ?>
            <li><?= $row['egyenleg']; ?>Ft</li>
            <?php endwhile; ?>
            <li><?=$_SESSION['felhasz_nev']; ?></li>
            <?php else : ?>
            <li><a href="register.php">Regisztráció</a></li>
            <li><a href="login.php">Bejelentkezés</a></li>
            <?php endif; ?>

          </ul>
        </nav>
      </header>
    </div>
