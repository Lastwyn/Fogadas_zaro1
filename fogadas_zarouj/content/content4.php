<?php include("content0.php"); ?>
<?php
$odd = $result2[0][1];
$value = $result2[0][0];
$value2 = $result2[0][1];
echo '<div class="bet-box" onclick="openBetModal(\'Hazai\',' . $odd . ')">
        <h4>' . $value . " - " . $value2 . '</h4>
      </div>';
?>