<?php
include('header.php');
if(isset($_POST['bejelentkezes'])){
    $email = $_POST['email'];
    $password = $_POST['jelszo'];

    $sql = "SELECT * FROM felhasznaloi_adatok WHERE email = '$email';";
    $result = $db->RunSQL($sql);
    $felhasznalo = $result->fetch_assoc();

    if ($felhasznalo != false && password_verify($password, $felhasznalo['jelszo'])) {
        $_SESSION['email'] = $felhasznalo['email'];
        $_SESSION['felhasz_nev'] = $felhasznalo['felhasz_nev'];
        header('Location: Foldal.php');
    } else {
        echo 'Valami szar!'; 
    }
    
}
?>
<div class="row">
    <main>
        <div class="login-bodycard">
            <form method="POST">
                <div>
                    <input type="email" name="email" id="email" placeholder="Email-cím" required>
                </div>
                <div>
                    <input type="password" name="jelszo" id="jelszo" placeholder="Jelszó" required>
                </div>
                <div>
                    <a href="resetpassword.php">Jelszó visszaállítás</a>
                </div>
                <div>
                    <button id="bejelentkezes" name="bejelentkezes">Bejelentkezés</button>
                </div>
            </form>
        </div>
    </main>
</div>

<?php
include('footer.php');
?>