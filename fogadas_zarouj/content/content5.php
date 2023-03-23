<?php include("content0.php"); ?>
<?php
$value = $result2[2][0];
$odd = $result2[2][1];
$value2 = $result2[2][2];
echo '<div class="bet-box" onclick="openBetModal(\'Döntetlen\',' . $odd . ', ' . $value2 . ')">
               <h4>' . $value . " - " . $odd . '</h4>
             </div>';
?>