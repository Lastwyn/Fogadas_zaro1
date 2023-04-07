<?php include('header.php');
$sql6 = "SELECT egyenleg FROM penztarca WHERE felhasz_id = " . $_SESSION['felhasz_id'] . ";";
$result6 = $db->RunSQL($sql6);
$result6 = $result6->fetch_assoc()['egyenleg'];

if (isset($_POST['penzbe'])) {
    $sql2 = "SELECT penztarca_id FROM penztarca WHERE penztarca_id = " . $_SESSION['penztarca_id'] . ";";
    $result2 = $db->RunSQL($sql2);
    $fid = $result2->fetch_assoc()['penztarca_id'];
    $kartyaszam = $db->security($_POST['kartyaszam']);
    $kartyat = $db->security($_POST['kartyat']);
    $osszeg = $db->security($_POST['osszeg']);
    $valid = $db->security($_POST['valid-thru-text']);
    $cvv = $db->security($_POST['cvv-text']);
    $szetvalid = explode('/', $valid);
    $expires = \DateTime::createFromFormat('my', $szetvalid[0] . $szetvalid[1]);
    $now     = new \DateTime();

    if ($expires > $now) {
        if ($osszeg >= 1500 && $osszeg <= 2000000) {
            $sql1 = "INSERT INTO be_ki_fizetes VALUES (NULL,'$fid','" . date("Y-m-d H:i:s") . "','$kartyaszam','$valid','$cvv', '+$osszeg','$kartyat');";
            $result = $db->RunSQL($sql1);
            $sql = "UPDATE penztarca SET egyenleg = egyenleg + $osszeg WHERE penztarca_id = '$fid'";
            $result = $db->RunSQL($sql);
            header('Location:Foldal.php');
        } else {
            echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
            echo '<p>Nem megfelelő összeget adott meg!</p><p>A minimum feltöltési összeg 1.500Ft, a maximum feltöltési érték 2.000.000Ft!</p>';
            echo '</div>';
            echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';
        }
    } else {
        echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
        echo '<p>A kártyája nem érvényes vagy lejárt!</p>';
        echo '</div>';
        echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';
    }
}

if (isset($_POST['penzki'])) {
    $sql2 = "SELECT penztarca_id FROM penztarca WHERE penztarca_id = " . $_SESSION['penztarca_id'] . ";";
    $result2 = $db->RunSQL($sql2);
    $fid = $result2->fetch_assoc()['penztarca_id'];
    $kartyaszam = $db->security($_POST['kartyaszam']);
    $kartyat = $db->security($_POST['kartyat']);
    $osszeg = $db->security($_POST['osszeg']);
    $valid = $db->security($_POST['valid-thru-text']);
    $cvv = $db->security($_POST['cvv-text']);
    $szetvalid = explode('/', $valid);
    $expires = \DateTime::createFromFormat('my', $szetvalid[0] . $szetvalid[1]);
    $now     = new \DateTime();

    if ($expires > $now) {
        if ($osszeg <= $result6) {
            if ($osszeg >= 10000 && $osszeg <= 2000000) {

                $sql = "INSERT INTO be_ki_fizetes VALUES (NULL,'$fid','" . date("Y-m-d H:i:s") . "','$kartyaszam','$valid','$cvv', '-$osszeg','$kartyat');";
                $result = $db->RunSQL($sql);
                $sql3 = "UPDATE penztarca SET egyenleg = egyenleg - $osszeg WHERE penztarca_id = '$fid'";
                $result = $db->RunSQL($sql3);
                header('Location:Foldal.php');
            } else {
                echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
                echo '<p>Nem megfelelő összeget adott meg!</p><p>A minimum kifizetési összeg 10.000Ft, a maximum kifizetési érték 2.000.000Ft!</p>';
                echo '</div>';
                echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';
            }
        } else {
            echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
            echo '<p>Nagyobb értékben akart kiutalni pénzt mint amennyivel rendelkezik!</p>';
            echo '</div>';
            echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';
        }
    } else {
        echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
        echo '<p>A kártyája nem érvényes vagy lejárt!</p>';
        echo '</div>';
        echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';
    }
}


?>

<body>
    <main>
        <div class="igazit">
            <section class="ui">
                <div class="container-left">
                    <form id="credit-card" method="POST">
                        <div class="number-container">
                            <label>Kártya Szám</label>
                            <input type="text" name="kartyaszam" id="card-number" maxlength="19" placeholder="1234 5678 9101 1121" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                        <div class="name-container">
                            <label>Kártya Tulajdonos</label>
                            <input type="text" name="kartyat" id="name-text" maxlength="30" placeholder="Nagy János" required onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.key == ' '">
                        </div>
                        <div class="name-container">
                            <label>Összeg</label>
                            <input type="text" name="osszeg" id="name-text" min="50" max="2000000" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        </div>
                        <div class="infos-container">
                            <div class="expiration-container">
                                <label>Lejárati Dátum</label>
                                <input type="text" name="valid-thru-text" id="valid-thru-text" maxlength="5" placeholder="02/40" required onkeypress="return event.charCode >=48 && event.charCode <= 57">
                            </div>
                            <div class="cvv-container">
                                <label>CVV</label>
                                <input type="text" name="cvv-text" id="cvv-text" maxlength="3" placeholder="123" required onkeypress="return event.charCode >=48 && event.charCode <= 57">
                            </div>
                        </div>
                        <input type="submit" value="Pénz befizetés" id="add" name="penzbe">
                        <input type="submit" value="Pénz kifizetés" id="add" name="penzki">
                    </form>
                </div>
                <div class="container-right">
                    <div class="card">
                        <div class="intern">
                            <img class="approximation" src="img/aprox.png" alt="aproximation">
                            <div class="card-number">
                                <div class="number-vl">1234 5678 9101 1121</div>
                            </div>
                            <div class="card-holder">
                                <label>Kártyatulajdonos neve</label>
                                <div class="name-vl">Nagy János</div>
                            </div>
                            <div class="card-infos">
                                <div class="exp">
                                    <label>Érvényes</label>
                                    <div class="expiration-vl">02/40</div>
                                </div>
                                <div class="cvv">
                                    <label>CVV</label>
                                    <div class="cvv-vl">123</div>
                                </div>
                            </div>
                            <img class="chip" src="img/chip.png" alt="chip">
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </main>
</body>
<script src="js/penztarca.js"></script>
<?php include('footer.php'); ?>