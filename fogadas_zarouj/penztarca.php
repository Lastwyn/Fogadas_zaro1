<?php include('header.php');

if (isset($_POST['penzbe'])) {
    print_r($_SESSION);
    $sql2 = "SELECT penztarca_id FROM penztarca WHERE penztarca_id = " .$_SESSION['penztarca_id'] .";";
    $result2 = $db->RunSQL($sql2);
    $fid = $result2->fetch_assoc()['penztarca_id'];
    $kartyaszam = $db->security($_POST['kartyaszam']);
    $kartyat = $db->security($_POST['kartyat']);
    $osszeg = $db->security($_POST['osszeg']);
    $sql1 = "INSERT INTO be_ki_fizetes VALUES (NULL,'$fid','". date("Y-m-d H:i:s") . "','$kartyaszam', '+$osszeg','$kartyat');";
    $result = $db->RunSQL($sql1);
    $sql = "UPDATE penztarca SET egyenleg = egyenleg + $osszeg WHERE penztarca_id = '$fid'";

    $result = $db->RunSQL($sql);
    header('Location:Foldal.php');
}
if (isset($_POST['penzki'])) {
    $sql2 = "SELECT penztarca_id FROM penztarca WHERE penztarca_id = " .$_SESSION['penztarca_id'] .";";;
    $result2 = $db->RunSQL($sql2);
    $fid = $result2->fetch_assoc()['penztarca_id'];
    $kartyaszam = $db->security($_POST['kartyaszam']);
    $kartyat = $db->security($_POST['kartyat']);
    $osszeg = $db->security($_POST['osszeg']);
    $sql = "INSERT INTO be_ki_fizetes VALUES (NULL,'$fid','". date("Y-m-d H:i:s") . "','$kartyaszam', '-$osszeg','$kartyat');";
    $result = $db->RunSQL($sql);
    $sql3 = "UPDATE penztarca SET egyenleg = egyenleg - $osszeg WHERE penztarca_id = '$fid'";
    $result = $db->RunSQL($sql3);
    header('Location:Foldal.php');
}

?>

<main >
    <div class="grid-container-adat">
        <div class="col1-adat">
            <h2>Felhasználó neve:</h2>
            <?php if (isset($_SESSION['felhasz_nev'])): ?>
                <h3>
                    <?= $_SESSION['felhasz_nev']; ?>
                </h3>
            <?php endif; ?>
        </div>
        <div class="col2-adat">
            <h2>Egyenlege:</h2>
            <?php if (isset($_SESSION['egyenleg'])): ?>
                <h3>
                    <?= $_SESSION['egyenleg']; ?> Ft
                </h3>
            <?php endif; ?>
        </div>
    </div>
 <form method="POST">
    <div class="kozos1">
        <div class="penzfeltoltes">
            <h1>Pénzfeltöltés / Pénzkifizetés:</h1>
            <div class="grid-container-penzfeltoltes">
               
                    <div class="col1-penzfeltoltes">
                        <label for="kartyaszam">Adja meg a kártyaszámot:</label>
                        <input type="text" name="kartyaszam" id="kartyaszam" required>
                    </div>
                    <div class="col2-penzfeltoltes">
                        <label for="kartyat">Adja meg a kártyatulajdonos nevét:</label>
                        <input type="text" name="kartyat" id="kartyat" required>
                        <br>
                        <button class="button" id="penzbe" name="penzbe">Pénzfeltöltés</button>
                        <button class="button" id="penzki" name="penzki">Pénzkifizetés</button>
                    </div>
                    <div class="col3-penzfeltoltes">
                        <label for="osszeg">Adja meg a kívánt összeget:(Ft)</label>
                        <input type="text" name="osszeg" id="osszeg" required>
                    </div>
                </form>
            </div>
        </div>
    </div>



</main>

<?php include('footer.php'); ?>