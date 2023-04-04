<?php 
include('header.php');

$jelszo1 = $jelszo2 = "";
$email = $db->security($_GET['email']);
isset($_GET['hash']) ? $hash = $db->security($_GET['hash']) : $hash = "";
if (isset($_POST['megerosites'])) {
    $jelszo1 = $db->security($_POST['jelszo1']);
    $jelszo2 = $db->security($_POST['jelszo2']);
    if ($jelszo1 == $jelszo2) {
        $jelszo = password_hash($_POST['jelszo1'], PASSWORD_DEFAULT);
        $sql = "UPDATE felhasznaloi_adatok SET jelszo = '$jelszo' WHERE email= '$email' AND hash ='$hash';";
        $result = $db->RunSQL($sql);

        if ($result > 0 ) {
            echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
            echo '<p>Jelszó beállítva!</p>';
            echo '</div>';
            echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';       
        }else {
            echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
            echo '<p>A jelszó módosítása nem lehetséges!</p>';
            echo '</div>';
            echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';  
        }
    }else {
        echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
        echo '<p>A jelszavak nem egyeznek!</p>';
        echo '</div>';
        echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';  
    }
}

?>



<div class="row">
    <main>
        <div class="login-bodycard">
            <h1>Új jelszó beállítása</h1>
            <form method="POST">
                <div>
                    <input type="password" name="jelszo1" id="login-input" placeholder="Email-cím" required>
                </div>
                <div>
                    <input type="password" name="jelszo2" id="login-input" placeholder="Email-cím" required>
                </div>
                <div>
                    <button id="input_button2"  name="megerosites">Megerősítés</button>
                </div>
            </form>
        </div>
    </main>
</div>

<?php
include('footer.php');
?>