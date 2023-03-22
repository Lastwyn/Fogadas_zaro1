<?php
include("content0.php");
if(isset($_POST['submit'])) {

  // Az adatok mentése az adatbázisba
  $f_id = $_POST['value2'];
  $osszeg = $_POST['osszeg'];
  $sql = "INSERT INTO fogadas VALUES ('0', '0', '0','0','0','0')";
  header('Location: Foldal.php');
}
?>