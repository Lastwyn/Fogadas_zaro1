<?php include("content0.php"); ?>
<?php
$value = $result2[1][0];
$odd = $result2[1][1];
$value2 = $result2[1][2];
echo '<div class="bet-box" onclick="openBetModal(\'Vendég\', ' . $odd . ', ' . $value2 . ')">
               <h4>' . $value . " - " . $odd . '</h4> 
             </div>';
?>