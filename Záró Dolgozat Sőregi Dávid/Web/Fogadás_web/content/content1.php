<?php include("content0.php"); ?>
<h1><?php print_r($pieces[0]); ?></h1>
<h2><?php print_r($hazainev->fetch_assoc()['nemzet_nev']); ?></h2>
<h2>Játékosok:</h2>
<?php
foreach ($jatekosokhazai->fetch_all() as $key => $value) {
    echo "<h4>" . $value[1] . "</h4>";
}
?>