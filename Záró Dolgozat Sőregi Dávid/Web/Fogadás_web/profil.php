<?php include('header.php');

$sql = "SELECT `felhasz_nev`, `email`,  `reg_datum`, `okmany`, `neme`, `orszag` FROM `felhasznaloi_adatok` WHERE felhasz_id = " . $_SESSION['felhasz_id'] . ";";
$result = $db->RunSQL($sql);
$adatok = $result->fetch_all();

if (isset($_POST['delete_user'])) {
        $sql2 = "DELETE FROM `felhasznaloi_adatok` WHERE felhasz_id = " . $_SESSION['felhasz_id'] . ";";
        $db->RunSQL($sql2);
        include('logout.php');
}
?>

<body>
    <main>
        <div class="kozepre">
            <div class="table-container">
                <table class="table">
                    <thead>
                        <th>Felhasználó Név</th>
                        <th>Email-cím</th>
                        <th>Regisztráció Dátuma</th>
                        <th>Okmány</th>
                        <th>Neme</th>
                        <th>Ország</th>
                    </thead>

                    <tbody>
                        <tr>

                            <th>
                                <?= $adatok[0][0]; ?>
                            </th>
                            <td>
                                <?= $adatok[0][1]; ?>
                            </td>
                            <td>
                                <?= $adatok[0][2]; ?>
                            </td>
                            <td>
                                <?= $adatok[0][3]; ?>
                            </td>
                            <td>
                                <?= $adatok[0][4]; ?>
                            </td>
                            <td>
                                <?= $adatok[0][5]; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </div>
            <hr class="hr2">
            <form method="POST">
                <button type="submit" name="delete_user" id="add">Felhasználó törlése</button>
            </form>
        </div>

    </main>
</body>

<div class="row">
    <footer class="lent">
        <p>&copy; 2023 Sőregi Dávid fogadó oldala.</p>
    </footer>
</div>