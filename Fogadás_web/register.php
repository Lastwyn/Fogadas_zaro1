<?php 
include('header.php');
if (isset($_POST['regisztracio'])) {
    $felhasznalo_nev = $db->security($_POST['felhasznalo_nev']);
    $email = $db->security($_POST['email']);
    $password = password_hash($db->security($_POST['jelszo']), PASSWORD_DEFAULT);
    $okmany = $db->security($_POST['okmany']);
    $neme = $db->security($_POST['nem']);
    $orszag = $db->security($_POST['orszag']);
    //ellenőrzés
    $sql = "SELECT * FROM felhasznaloi_adatok WHERE felhasz_nev = '$felhasznalo_nev'";
    $result  = $db->RunSQL($sql);
    $F_ellenorzes = $result->fetch_assoc();

    $sql = "SELECT * FROM felhasznaloi_adatok WHERE email = '$email'";
    $result  = $db->RunSQL($sql);
    $E_ellenorzes = $result->fetch_assoc();
    if ($F_ellenorzes != false) {
        echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
        echo '<p>Az email-cím megfelelő, de a felhasználónév már foglalt!</p>';
        echo '</div>';
        echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';       
    }elseif ($E_ellenorzes != false) {
        echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
        echo '<p>Az email-cím már foglalt!</p>';
        echo '</div>';
        echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>'; 
    }else {
        $hash = $db->Hash($felhasznalo_nev);
        $sql = "INSERT INTO felhasznaloi_adatok VALUES ('null', '$felhasznalo_nev', '$email', '$password','$hash', '". date("Y-m-d H:i:s") . "','$okmany', '$neme', '$orszag');";
        $result = $db->RunSQL($sql);
        echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
        echo '<p>Sikeres regisztráció!</p>';
        echo '</div>';
        echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';
        header('Location:login.php');
    }
    $sql2 = "SELECT felhasz_id FROM felhasznaloi_adatok ORDER BY felhasz_id DESC LIMIT 1";
    $result2 = $db->RunSQL($sql2);
    $fid = $result2->fetch_assoc()['felhasz_id'];
    $sql1 = "INSERT INTO penztarca VALUES ('$fid','null','0');";
    $result = $db->RunSQL($sql1);
}

?>
<div class="row">
    <main>
        <div class="register-bodycard">
            <form method="POST">
                <div class="register_in">
                    <label for="felhasznalo_nev" id="label">Felhasználó név:</label>
                    <input  type="text" name="felhasznalo_nev" id="input" placeholder="Felhasználónév" maxlength="100" required>
                </div>
                <div class="register_in">
                <label for="email" id="label">Email-cím:</label>
                    <input type="email" name="email" id="input" placeholder="Email-cím" maxlength="100" required>
                </div>
                <div class="register_in">
                <label for="jelszo" id="label">Jelszó:</label>
                    <input type="password" name="jelszo" id="input" placeholder="Jelszó" maxlength="100" required>
                </div>
                <div class="register_in">
                <label for="okmany" id="label">Okmány Száma:</label>
                    <input type="text" name="okmany" id="input" placeholder="Azonosító szám" maxlength="8" required>
                </div>
                <div class="register_in">
                <label for="nem" id="label">Nemed:</label>
                    <label for="nemradio">
                        <input type="radio" name="nem" id="input2" value="Férfi" required>
                        Férfi
                    </label>
                    <label for="nemradio">
                        <input type="radio" name="nem" id="input2" value="Nő" required>
                        Nő
                    </label>
                </div>
                <div class="register_in">
                <label for="orszag" id="label">Ország:</label>
                    <input type="text" name="orszag" id="input" maxlength="100" placeholder="Ország">
                </div>
                <div class="register_in">
                    <button id="input_button" name="regisztracio">Regisztráció</button>
                </div>
                <div class="register_in">
                   <p>Van már van fiókod? <a href="login.php">Jelenzkezz be!</a></p>
                </div>
            </form>
        </div>
    </main>
</div>
