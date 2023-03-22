<?php include("content0.php"); ?>
<?php
$odd = $result2[0][1];
$value = $result2[0][0];
$value2 = $result2[0][2];

echo '<div class="bet-box">
<h4>' . $value . " - " . $odd . '</h4>
  <button onclick="showPopup()">Fogadás</button>
<div id="popup" style="display: none;">
<div class="popup-box">
  <form action="atiranyito_fajl.php" method="post">
    <h4><?php echo $value . " - " . $value2; ?></h4>
    <input type="hidden" name="value2" value="<?php echo $value2; ?>">
    <input type="text" name="osszeg" placeholder="Összeg"><br>
    <button  type="submit" name="submit">Fogadás</button>
   
  </form> 
  <button onclick="hidePopup()">Bezárás</button>
</div>

</div>
</div>


<script>
function showPopup() {
  document.getElementById("popup").style.display = "block";
}
function hidePopup() {
  document.getElementById("popup").style.display = "none";
}
</script>'
?>