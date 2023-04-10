<?php include("content0.php"); ?>
<?php
$value = $result2[2][0];
$odd = $result2[2][1];
$value2 = $result2[2][2];
echo '<h2>Végeredmény:</h2>';
echo '<div class="bet-box" onclick="openBetModal(\'Döntetlen\',' . $odd . ', ' . $value2 . ')">
             <h4>' . $value . " - " . $odd . '</h4>
             </div>';
$egyfelet1 = $result2[3][1];
$egyfelet2 = $result2[3][0];
$egyfelet3 = $result2[3][2];
echo '<h2>Meccs gólszáma:</h2>';
echo '<div class="bet-box" onclick="openBetModal(\'+1.5 Gól\',' . $egyfelet1 . ', ' . $egyfelet3 . ')">
             <h4>' . $egyfelet2 . " - " . $egyfelet1 . '</h4>   
             </div>   
           </div>';
$kettofelet1 = $result2[4][1];
$kettofelet2 = $result2[4][0];
$kettofelet3 = $result2[4][2];
echo '<div class="bet-box" onclick="openBetModal(\'+2.5 Gól\',' . $kettofelet1 . ', ' . $kettofelet3 . ')">
             <h4>' . $kettofelet2 . " - " . $kettofelet1 . '</h4>      
           </div>';
$haromfelet1 = $result2[5][1];
$haromfelet2 = $result2[5][0];
$haromfelet3 = $result2[5][2];
echo '<div class="bet-box" onclick="openBetModal(\'+3.5 Gól\',' . $haromfelet1 . ', ' . $haromfelet3 . ')">
             <h4>' . $haromfelet2 . " - " . $haromfelet1 . '</h4>      
           </div>';
$otfolott1 = $result2[6][1];
$otfolott2 = $result2[6][0];
$otfolott3 = $result2[6][2];
echo '<div class="bet-box" onclick="openBetModal(\'+5 Gól\',' . $otfolott1 . ', ' . $otfolott3 . ')">
             <h4>' . $otfolott2 . " - " . $otfolott1 . '</h4>      
           </div>';
$haromalatt1 = $result2[7][1];
$haromalatt2 = $result2[7][0];
$haromalatt3 = $result2[7][2];
echo '<div class="bet-box" onclick="openBetModal(\'-3.5 Gól\',' . $haromalatt1 . ', ' . $haromalatt3 . ')">
             <h4>' . $haromalatt2 . " - " . $haromalatt1 . '</h4>      
           </div>';
$kettoalatt1 = $result2[8][1];
$kettoalatt2 = $result2[8][0];
$kettoalatt3 = $result2[8][2];
echo '<div class="bet-box" onclick="openBetModal(\'-2.5 Gól\',' . $kettoalatt1 . ', ' . $kettoalatt3 . ')">
             <h4>' . $kettoalatt2 . " - " . $kettoalatt1 . '</h4>      
           </div>';

$egyalatt1 = $result2[9][1];
$egyalatt2 = $result2[9][0];
$egyalatt3 = $result2[9][2];
echo '<div class="bet-box" onclick="openBetModal(\'-1.5 Gól\',' . $egyalatt1 . ', ' . $egyalatt3 . ')">
             <h4>' . $egyalatt2 . " - " . $egyalatt1 . '</h4>      
           </div>';
?>