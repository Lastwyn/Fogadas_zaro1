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
        http://localhost/fogadas_zarouj/newpassword.php?email=' . $visszaemail . '&hash=' . $felhasznalo['hash'];
        $headers = 'from:admin@localhost.org';
        print_r(mail($to, $subject, $message, $headers));
        
        echo '<div class="alert alert-success" role="alert">Az E-mailt elküldtük a megadott e-mail címedre</div>';
    }
} else {
    echo 'Nem talált emailt!';
}

?>


<div class="row">
    <main>
        <div class="login-bodycard">
            <form method="POST">
                <div>
                    <input type="email" name="reset_email" id="reset_email" placeholder="Email-cím" required>
                </div>
                <div>
                    <button id="jelszovissza" name="jelszovissza">Elküld</button>
                </div>
            </form>
        </div>
    </main>
</div>

<?php
include('footer.php');
?>