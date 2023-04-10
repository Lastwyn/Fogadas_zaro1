<?php include('header.php');
?>

<main id="refresh">
  <h1 class="kozep">Fogadásaid</h1>
  <div class="container2">
    <h2 class="cim2">Futó fogadásaid</h2>
    <h2 class="cim2">Lefutott fogadásaid</h2>
  </div>
  <div class="table-container">
    <table class="table">
      <thead>
        <th>Csapatok</th>
        <th>Tét</th>
        <th>Profit/Buko</th>
        <th>Szorzó</th>
        <th>Fogadás neve</th>
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
          <th>
            <?= $hazai_nev; ?> --
            <?= $vendeg_nev; ?>
          </th>
          <td>
            <?= $value['fogadasi_osszeg']; ?>
          </td>
          <td>
            <?= $value['profit_buko']; ?>
          </td>
          <td>
            <?= $value['odds']; ?>
          </td>
          <td>
            <?= $value['fogadas_neve']; ?>
          </td>

      </tr>
    <?php }
    ?>

    </table>

    <table class="table">
      <thead>
        <th>Csapatok</th>
        <th>Tét</th>
        <th>profit/buko</th>
        <th>Szorzó</th>
        <th>Fogadás neve</th>
        <th>Eredmény</th>
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
          <th>
            <?= $hazai_nev; ?> --
            <?= $vendeg_nev; ?>
          </th>
          <td>
            <?= $value['fogadasi_osszeg']; ?>
          </td>
          <td>
            <?= $value['profit_buko']; ?>
          </td>
          <td>
            <?= $value['odds']; ?>
          <td>
            <?= $value['fogadas_neve']; ?>
          </td>
          </td>
          <td>
            <?= $value['eredmeny']; ?>
          </td>
      </tr>
    <?php }
    ?>
    </table>
  </div>
</main>
<div class="row">
  <footer class="lent">
    <p>&copy; 2023 Sőregi Dávid fogadó oldala.</p>
  </footer>
</div>
</div>


<script>
  function refresh() {

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      document.getElementById("refresh").innerHTML = this.responseText;

    }
    xhttp.open("GET", "fogadasok.php");
    xhttp.send();

  }
  refresh();
  setInterval(function() {
    refresh();
  }, 1000);
</script>
</div>