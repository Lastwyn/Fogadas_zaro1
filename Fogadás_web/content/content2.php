<?php include("content0.php"); ?>
<h1>---</h1>
<h2>Eredmények</h2>
<h2>Gólszerzők:</h2>
<?php
foreach ($gollovo as $key => $value) {
    echo "<h4>" . $value . "</h4>";
}
?>