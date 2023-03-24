<?php 
include('header.php');

?>
<main>
    <h1>Fogadásaid</h1>
    <?php
    $sql = "SELECT * FROM meccs_eredmeny WHERE lefutott_e = 1 ORDER BY meccs_id DESC LIMIT 1 ";
    $result1 = $db->RunSQL($sql);
    $result1 = $result1->fetch_assoc();
    $temp = explode('-', $result1['eredmeny']);
    $hazaigol = $temp[0];
    $vendeggol = $temp[1];
    $nyert = 0;

    if ($hazaigol > $vendeggol) {
        $nyert = 1;
        echo 'A hazai nyert';
    } else if ($hazaigol == $vendeggol) {
        $nyert = 2;
        echo 'Döntetlen lett a meccs';
    } else {
        $nyert = 3;
        echo 'A vendég nyert';
    }
    $sqlle = "SELECT fogadasi_osszeg FROM fogadas ORDER BY `fog_id` DESC LIMIT 1";
    $result = $db->RunSQL($sqlle);
    $result = $result->fetch_assoc();   
    $sql2 = "UPDATE fogadas SET profit_buko = '"."-".$result['fogadasi_osszeg']."' WHERE  ;";
    $result2 = $db->RunSQL($sql2);
 
    ?>

    
</main>
<?php include('footer.php') ?>