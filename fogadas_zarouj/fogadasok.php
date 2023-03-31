
<?php include('header.php');
?>


<main id="refresh">
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
          <?= $value['eredmeny']; ?>
        </td>
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
          <?= $value['eredmeny']; ?>
        </td>
      </tr>
    <?php }
      ?>
    </table>
</main> 
 <?php include('footer.php') ?>

</div>




<script>
  function refresh() {
   
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function () {
        document.getElementById("refresh").innerHTML = this.responseText;
      }
      xhttp.open("GET", "fogadasok.php");
      xhttp.send();
  
  }
  refresh();
  setInterval(function () {
    refresh();
  }, 1000);
</script>
</div>