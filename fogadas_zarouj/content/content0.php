<?php
include('../database.php');

$sql2 = "SELECT * FROM meccs_eredmeny ORDER BY meccs_id DESC LIMIT 1;";
$result = $db->RunSQL($sql2)->fetch_assoc();
$gollovo = explode(",", $result['gol_szerzo']);
$pieces = explode("-", $result['eredmeny']);

$sql = "SELECT DISTINCT nemzetek.nemzet_nev FROM nemzetek INNER JOIN meccs_eredmeny ON meccs_eredmeny.hazai_id = nemzetek.nemzet_id WHERE nemzetek.nemzet_id = ?";
$hazainev = $db->RunSQLPrms($sql, "i", $result['hazai_id']);

$sql3 = "SELECT DISTINCT nemzetek.nemzet_nev FROM nemzetek INNER JOIN meccs_eredmeny ON meccs_eredmeny.vendeg_id = nemzetek.nemzet_id WHERE nemzetek.nemzet_id = ?";
$vendegnev = $db->RunSQLPrms($sql3, "i", $result['vendeg_id']);

$sql4 = "SELECT * FROM `jatekosok` WHERE `nemzet_id` = ?";
$jatekosokhazai = $db->RunSQLPrms($sql4, "i", $result['hazai_id']);

$sql5 = "SELECT * FROM `jatekosok` WHERE `nemzet_id` = ?";
$jatekosokvendeg = $db->RunSQLPrms($sql5, "i", $result['vendeg_id']);

$sql6 = "SELECT fogadas_neve, szorzo, fogadasi_szam FROM `fogadasi_lehetoseg`  ";
$result2 = $db->RunSQL($sql6)->fetch_all();

?>