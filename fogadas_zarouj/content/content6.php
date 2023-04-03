<?php include("content0.php"); ?>
<?php
$value = $result2[1][0];
$odd = $result2[1][1];
$value2 = $result2[1][2];

echo '<div class="bet-box" onclick="openBetModal(\'Vendég\', ' . $odd . ', ' . $value2 . ')">
               <h4>' . $value . " - " . $odd . '</h4> 
             </div>';
echo '<h2>Vendég Gólszám:</h2>';
$vegyfelet1 = $result2[16][0];
$vegyfelet2 = $result2[16][1];
$vegyfelet3 = $result2[16][2];
echo '<div class="bet-box" onclick="openBetModal(\'Vendég +1.5 Gól\',' . $vegyfelet2  . ', ' . $vegyfelet3 . ')">
             <h4>' . $vegyfelet1 . " - " . $vegyfelet2 . '</h4>
             </div>';
$vkettofelet1 = $result2[17][0];
$vkettofelet2 = $result2[17][1];
$vkettofelet3 = $result2[17][2];
echo '<div class="bet-box" onclick="openBetModal(\'Vendég +2.5 Gól\',' . $vkettofelet2  . ', ' . $vkettofelet3 . ')">
             <h4>' . $vkettofelet1 . " - " . $vkettofelet2 . '</h4>
             </div>';
$vharomfelet1 = $result2[18][0];
$vharomfelet2 = $result2[18][1];
$vharomfelet3 = $result2[18][2];
echo '<div class="bet-box" onclick="openBetModal(\'Vendég +3.5 Gól\',' . $vharomfelet2  . ', ' . $vharomfelet3 . ')">
             <h4>' . $vharomfelet1 . " - " . $vharomfelet2 . '</h4>
             </div>';
$vharomalatt1 = $result2[19][0];
$vharomalatt2 = $result2[19][1];
$vharomalatt3 = $result2[19][2];
echo '<div class="bet-box" onclick="openBetModal(\'Vendég -3.5 Gól\',' . $vharomalatt2  . ', ' . $vharomalatt3 . ')">
             <h4>' . $vharomalatt1 . " - " . $vharomalatt2 . '</h4>
             </div>';
$vkettoalatt1 = $result2[20][0];
$vkettoalatt2 = $result2[20][1];
$vkettoalatt3 = $result2[20][2];
echo '<div class="bet-box" onclick="openBetModal(\'Vendég -2.5 Gól\',' . $vkettoalatt2  . ', ' . $vkettoalatt3 . ')">
             <h4>' . $vkettoalatt1 . " - " . $vkettoalatt2 . '</h4>
             </div>';
$vegyalatt1 = $result2[21][0];
$vegyalatt2 = $result2[21][1];
$vegyalatt3 = $result2[21][2];
echo '<div class="bet-box" onclick="openBetModal(\'Vendég -1.5 Gól\',' . $vegyalatt2  . ', ' . $vegyalatt3 . ')">
             <h4>' . $vegyalatt1 . " - " . $vegyalatt2 . '</h4>
             </div>';
?>