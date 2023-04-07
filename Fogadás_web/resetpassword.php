<?php
include('header.php');
if (isset($_POST['jelszovissza'])) {
    $visszaemail = $db->security($_POST['reset_email']);
    $sql = "SELECT * FROM felhasznaloi_adatok WHERE email='$visszaemail';";
    $result = $db->RunSQL($sql);
    $felhasznalo = $result->fetch_assoc();

    if ($felhasznalo != false) {
        $to = $visszaemail;
        $subject = 'Password Reset';
        $message = '
        Elfelejtett jelszó
        ------------------------
        Felhasználói név: ' . $felhasznalo['felhasz_nev'] . '
        ------------------------
        Kérjük, kattintson erre a linkre új jelszó beállításához:
        http://localhost/Fogadás_web/newpassword.php?email=' . $visszaemail . '&hash=' . $felhasznalo['hash'];
        $headers = 'from:admin@localhost.org';
        mail($to, $subject, $message, $headers);
        echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
        echo '<p>Az E-mailt elküldtük a megadott e-mail címedre</div></p>';
        echo '</div>';
        echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';
        
    } else {
        echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
        echo '<p>Nem talált emailt!</p>';
        echo '</div>';
        echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';
      
    }
}


?>


<div class="row">
    <main>
        <div class="login-bodycard">
        <h2 class="kozep">Add meg az email-címedet <br>a jelszó megújításához.</h2>
        <hr class="hr">
            <form method="POST">
                <div>
                    <input type="email" name="reset_email" id="login-input" placeholder="Email-cím" required>
                </div>
                <div>
                    <button id="input_button2" name="jelszovissza">Elküld</button>
                </div>
            </form>
        </div>
    </main>
</div>

<?php
include('footer.php');
?>