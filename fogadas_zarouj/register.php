<?php 
include('header.php');
if (isset($_POST['regisztracio'])) {
    $felhasznalo_nev = $db->security($_POST['felhasznalo_nev']);
    $email = $db->security($_POST['email']);
    $password = $db->security($_POST['password']);
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
        echo 'Az email-cím megfelelő, de a felhasználónév már foglalt!';
    }elseif ($E_ellenorzes != false) {
        echo 'Az email-cím már foglalt!';
    }else {
        
    }

}

?>
<div class="row">
    <main>
        <div class="register-bodycard">
            <form method="POST">
                <div>
                    <input type="text" name="felhasznalo_nev" id="felhasznalo_nev" placeholder="Felhasználónév" required>
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email-cím" required>
                </div>
                <div>
                    <input type="password" name="jelszo" id="jelszo" placeholder="Jelszó" required>
                </div>
                <div>
                    <input type="text" name="okmany" id="okmany" placeholder="Azonosító szám" required>
                </div>
                <div>
                    <label for="nemradio">
                        <input type="radio" name="nem" id="nem" value="Férfi" required>
                        Férfi
                    </label>
                    <label for="nemradio">
                        <input type="radio" name="nem" id="nem" value="Nő" required>
                        Nő
                    </label>
                </div>
                <div>
                    <input type="text" name="orszag" id="orszag" placeholder="Ország">
                </div>
                <div>
                    <button id="regisztracio" name="regisztracio">Regisztráció</button>
                </div>
            </form>
        </div>
    </main>