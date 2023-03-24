<?php include("content0.php");
$temp = [];
$pieces2 = "";
$hazai = "";
if (isset($_COOKIE['grid1'])) {

    $adatok = explode(" , ", $_COOKIE['grid1']);
    if (count($adatok) != 3) {

        $pieces2 = $adatok[0];
        $hazai = $adatok[1];
        $temp = explode(",", $adatok[2]);
        echo count($adatok);
    } else {
        $pieces2 = $pieces[0];
        $hazai = $hazainev->fetch_assoc()['nemzet_nev'];
        $temp = $jatekosokhazai->fetch_all();
    }
} else {
    $pieces2 = $pieces[0];
    $hazai = $hazainev->fetch_assoc()['nemzet_nev'];
    $temp = $jatekosokhazai->fetch_all();
}


?>
<h1><?php echo $pieces2; ?></h1>
<h2><?php echo $hazai; ?></h2>
<h2>Játékosok:</h2>
<?php
$jatekosok = [];
foreach ($temp as $key => $value) {
    if (is_array($value)) {
        echo "<h4>" . $value[1] . "</h4>";
        array_push($jatekosok, $value[1]);
    }else{
        echo "<h4>" . $value . "</h4>";
        array_push($jatekosok, $value);
    }
}
$idk = implode(",", $jatekosok);


$cookie_name = "grid1";
$cookie_value = "$pieces2 , $hazai , $idk";

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>