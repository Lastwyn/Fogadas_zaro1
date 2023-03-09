<?php include("content0.php"); ?>
<?php
$value = $result2[2][0];
$odd = $result2[2][1];
$value2 = $result2[2][1];
echo '<div class="bet-box" onclick="openBetModal(\'Döntetlen\',' . $odd . ')">
               <h4>' . $value . " - " . $value2 . '</h4>
             </div>';
?>