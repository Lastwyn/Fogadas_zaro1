<?php include('header.php');

$sql1 = "SELECT DISTINCT `fogadasi_osszeg`,`profit_buko`, fogadas.meccs_id , fogadas.fogadasi_szam,fogadas.eredmeny, fogadas_neve, odds, hazai_id, vendeg_id FROM fogadas INNER JOIN fogadasi_lehetoseg ON fogadasi_lehetoseg.fogadasi_szam = fogadas.fogadasi_szam INNER JOIN meccs_eredmeny ON meccs_eredmeny.meccs_id = fogadas.meccs_id INNER JOIN nemzetek ON nemzetek.nemzet_id = meccs_eredmeny.hazai_id OR nemzetek.nemzet_id = meccs_eredmeny.vendeg_id WHERE felhasz_id = '" . $_SESSION['felhasz_id'] . "' AND lefutott_e = 0 ORDER BY fog_id DESC;";
$result1 = $db->RunSQL($sql1);
$sql = "SELECT DISTINCT `fogadasi_osszeg`,`profit_buko`, fogadas.meccs_id , fogadas.fogadasi_szam,fogadas.eredmeny, fogadas_neve, odds, hazai_id, vendeg_id FROM fogadas INNER JOIN fogadasi_lehetoseg ON fogadasi_lehetoseg.fogadasi_szam = fogadas.fogadasi_szam INNER JOIN meccs_eredmeny ON meccs_eredmeny.meccs_id = fogadas.meccs_id INNER JOIN nemzetek ON nemzetek.nemzet_id = meccs_eredmeny.hazai_id OR nemzetek.nemzet_id = meccs_eredmeny.vendeg_id WHERE felhasz_id = '" . $_SESSION['felhasz_id'] . "' AND lefutott_e = 1 ORDER BY fog_id DESC LIMIT 5;";
$result = $db->RunSQL($sql);
?>
<main>
    <h1>Fogadásaid</h1>

    <table>
        <thead>
            <th>Csapatok</th>
            <th>Tét</th>
            <th>profit/buko</th>
            <th>Szorzó</th>
            <th>eredmeny</th>
        </thead>


        <tr>
            <?php foreach ($result1 as $value) {
                $sql3 = "SELECT * FROM nemzetek WHERE nemzet_id = '" . $value['hazai_id'] . "';";
                $result3 = $db->RunSQL($sql3);
                $sql4 = "SELECT * FROM nemzetek WHERE nemzet_id = '" . $value['vendeg_id'] . "';";
                $result4 = $db->RunSQL($sql4);
                $hazai_nev = $result3->fetch_assoc()['nemzet_nev'];
                $vendeg_nev = $result4->fetch_assoc()['nemzet_nev'];
            ?>
                <th><?= $hazai_nev; ?> -- <?= $vendeg_nev; ?></th>
                <td><?= $value['fogadasi_osszeg']; ?></td>
                <td><?= $value['profit_buko']; ?></td>
                <td><?= $value['odds']; ?></td>
                <td><?= $value['eredmeny']; ?></td>
        </tr>
    <?php }
    ?>

    </table>

    <table>
        <thead>
            <th>Csapatok</th>
            <th>Tét</th>
            <th>profit/buko</th>
            <th>Szorzó</th>
            <th>eredmeny</th>
        </thead>

        <tr>
            <?php foreach ($result as $value) {
                $sql3 = "SELECT * FROM nemzetek WHERE nemzet_id = '" . $value['hazai_id'] . "';";
                $result3 = $db->RunSQL($sql3);
                $sql4 = "SELECT * FROM nemzetek WHERE nemzet_id = '" . $value['vendeg_id'] . "';";
                $result4 = $db->RunSQL($sql4);
                $hazai_nev = $result3->fetch_assoc()['nemzet_nev'];
                $vendeg_nev = $result4->fetch_assoc()['nemzet_nev'];

            ?>
                <th><?= $hazai_nev; ?> -- <?= $vendeg_nev; ?></th>
                <td><?= $value['fogadasi_osszeg']; ?></td>
                <td><?= $value['profit_buko']; ?></td>
                <td><?= $value['odds']; ?></td>
                <td><?= $value['eredmeny']; ?></td>
        </tr>
    <?php }
    ?>

    </table>

</main>
<?php include('footer.php') ?>