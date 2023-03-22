<?php include("content0.php"); ?>
<h1><?php print_r($pieces[1]); ?></h1>
<h2><?php print_r($vendegnev->fetch_assoc()['nemzet_nev']); ?></h2>
<h2>Játékosok:</h2>
<?php
foreach ($jatekosokvendeg->fetch_all() as $key => $value) {
    echo "<h4>" . $value[1] . "</h4>";
}
?>