<?php include("content0.php"); ?>
<?php
$odd = $result2[0][1];
$value = $result2[0][0];
$value2 = $result2[0][2];

echo '<div class="bet-box" onclick="openBetModal(\'Hazai\',' . $odd . ', ' . $value2 . ')">
        <h4>' . $value . " - " . $odd . '</h4>    
      </div>';
      echo '<h2>Hazai Gólszám:</h2>';
$vegyfelet1 = $result2[10][0];
$vegyfelet2 = $result2[10][1];
$vegyfelet3 = $result2[10][2];
echo '<div class="bet-box" onclick="openBetModal(\'Hazai +1.5 Gól\',' . $vegyfelet2  . ', ' . $vegyfelet3 . ')">
             <h4>' . $vegyfelet1 . " - " . $vegyfelet2 . '</h4>
             </div>';
$vkettofelet1 = $result2[11][0];
$vkettofelet2 = $result2[11][1];
$vkettofelet3 = $result2[11][2];
echo '<div class="bet-box" onclick="openBetModal(\'Hazai +2.5 Gól\',' . $vkettofelet2  . ', ' . $vkettofelet3 . ')">
             <h4>' . $vkettofelet1 . " - " . $vkettofelet2 . '</h4>
             </div>';
$vharomfelet1 = $result2[12][0];
$vharomfelet2 = $result2[12][1];
$vharomfelet3 = $result2[12][2];
echo '<div class="bet-box" onclick="openBetModal(\'Hazai +3.5 Gól\',' . $vharomfelet2  . ', ' . $vharomfelet3 . ')">
             <h4>' . $vharomfelet1 . " - " . $vharomfelet2 . '</h4>
             </div>';
$vharomalatt1 = $result2[13][0];
$vharomalatt2 = $result2[13][1];
$vharomalatt3 = $result2[13][2];
echo '<div class="bet-box" onclick="openBetModal(\'Hazai -3.5 Gól\',' . $vharomalatt2  . ', ' . $vharomalatt3 . ')">
             <h4>' . $vharomalatt1 . " - " . $vharomalatt2 . '</h4>
             </div>';
$vkettoalatt1 = $result2[14][0];
$vkettoalatt2 = $result2[14][1];
$vkettoalatt3 = $result2[14][2];
echo '<div class="bet-box" onclick="openBetModal(\'Hazai -2.5 Gól\',' . $vkettoalatt2  . ', ' . $vkettoalatt3 . ')">
             <h4>' . $vkettoalatt1 . " - " . $vkettoalatt2 . '</h4>
             </div>';
$vegyalatt1 = $result2[15][0];
$vegyalatt2 = $result2[15][1];
$vegyalatt3 = $result2[15][2];
echo '<div class="bet-box" onclick="openBetModal(\'Hazai -1.5 Gól\',' . $vegyalatt2  . ', ' . $vegyalatt3 . ')">
             <h4>' . $vegyalatt1 . " - " . $vegyalatt2 . '</h4>
             </div>';

      
?>