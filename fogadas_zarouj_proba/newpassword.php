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
            echo 'Jelszó beállítva!';
        }else {
            echo 'A jelszó módosítása nem lehetséges!';
        }
    }else {
        echo 'A jelszavak nem egyeznek!';
    }
}

?>



<div class="row">
    <main>
        <div class="login-bodycard">
            <form method="POST">
                <div>
                    <input type="password" name="jelszo1" id="jelszo1" placeholder="Email-cím" required>
                </div>
                <div>
                    <input type="password" name="jelszo2" id="jelszo2" placeholder="Email-cím" required>
                </div>
                <div>
                    <button id="megerosites" name="megerosites">Megerősítés</button>
                </div>
            </form>
        </div>
    </main>
</div>

<?php
include('footer.php');
?>