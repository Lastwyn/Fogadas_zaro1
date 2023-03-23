<?php include("content0.php"); ?>
<?php
$odd = $result2[0][1];
$value = $result2[0][0];
$value2 = $result2[0][2];
echo '<div class="bet-box" onclick="openBetModal(\'Hazai\',' . $odd . ', ' . $value2 . ')">
        <h4>' . $value . " - " . $odd . '</h4>
      </div>';
?>