<?php
include('header.php');
if (isset($_POST['bejelentkezes'])) {
    $email = $_POST['email'];
    $password = $_POST['jelszo'];

    $sql = "SELECT * FROM felhasznaloi_adatok INNER JOIN penztarca ON penztarca.felhasz_id = felhasznaloi_adatok.felhasz_id WHERE email = '$email';";
    $result = $db->RunSQL($sql);
    $felhasznalo = $result->fetch_assoc();

    if ($felhasznalo != false && password_verify($password, $felhasznalo['jelszo'])) {
        $_SESSION['email'] = $felhasznalo['email'];
        $_SESSION['felhasz_nev'] = $felhasznalo['felhasz_nev'];
        $_SESSION['felhasz_id'] = $felhasznalo['felhasz_id'];
        $_SESSION['penztarca_id'] = $felhasznalo['penztarca_id'];
        header('Location: Foldal.php');
       
    } else {
        echo '<div id="modal" style="position: fixed; top: 20%; left: 50%; transform: translateX(-50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 5px; text-align: center;  font-size: 16px; color: #333;">';
        echo '<p>Sikertelen bejelentkezés!</p> <p>Az email-cím vagy a jelszó nem volt megfelelő!</p>';
        echo '</div>';
        echo '<script>setTimeout(function(){document.getElementById(\'modal\').style.display = \'none\';}, 4000);</script>';  
    }

}
?>
<div class="row">
    <main>

        <div class="login-bodycard">
            <div>
                <h1 class="eltolas">Bejelentkezés</h1>
                
            </div>
            <hr class="hr">
            <div>
                <form method="POST">
                    <div class="login-in">
                        <input type="email" name="email" id="login-input" placeholder="Email-cím" required>
                    </div>
                    <div class="login-in">
                        <input type="password" name="jelszo" id="login-input" placeholder="Jelszó" required>
                    </div>
                    <div class="login-in">
                        <a href="resetpassword.php">Jelszó visszaállítás</a>
                    </div>
                    <div class="login-in">
                        <button id="input_button2" name="bejelentkezes">Bejelentkezés</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php
include('footer.php');
?>