<?php include("content0.php"); ?>
<?php
$odd = $result2[0][1];
$value = $result2[0][0];
$value2 = $result2[0][2];
print_r($result2);
$egyfelet1 = $result2[3][1];
$egyfelet2 = $result2[3][0];
$egyfelet3 = $result2[3][2];

echo '<div class="bet-box" onclick="openBetModal(\'Hazai\',' . $odd . ', ' . $value2 . ')">
        <h4>' . $value . " - " . $odd . '</h4>
       
      </div>';
     echo'<div class="bet-box" onclick="openBetModal(\'+1.5 Gól\',' . $egyfelet1 . ', ' . $egyfelet3 . ')">
        <h4>' . $egyfelet2 . " - " . $egyfelet1 . '</h4>
       
      </div>';
?>