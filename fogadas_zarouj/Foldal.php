<?php include('header.php');


if (isset($_POST['kuld'])) {
  if (isset($_SESSION['felhasz_id']) ? $_SESSION['felhasz_id'] = $db->security($_SESSION['felhasz_id']) : $_SESSION['felhasz_id'] = "") {
    $sql1 = "SELECT meccs_id, lefutott_e FROM meccs_eredmeny ORDER BY meccs_id DESC LIMIT 1";
    $result1 = $db->RunSQL($sql1);
    $result1 = $result1->fetch_assoc();
    if ($result1['lefutott_e'] == 0) {
      $osszeg = $_POST['betAmount'];
      $fid = $_POST['fid'];
      $odd = $_POST['odd'];
      $sql6 = "SELECT egyenleg FROM penztarca WHERE felhasz_id = " . $_SESSION['felhasz_id'] . ";";
      $result6 = $db->RunSQL($sql6);
      $egyenleg = $result6->fetch_assoc()['egyenleg'];
      if ($osszeg <= $egyenleg && $osszeg >= 50) {
        $sql = "INSERT INTO `fogadas`(`felhasz_id`, `fogadasi_osszeg`, `profit_buko`, `meccs_id`, `fogadasi_szam`,odds) VALUES ('" . $_SESSION['felhasz_id'] . "','$osszeg','0','" . $result1['meccs_id'] . "','$fid','$odd')";
        $result = $db->RunSQL($sql);
        $sql3 = "UPDATE penztarca SET egyenleg =  egyenleg - $osszeg WHERE felhasz_id = '" . $_SESSION['felhasz_id'] . "';";
        $result3 = $db->RunSQL($sql3);
        header('Location: fogadasok.php');
      } else {
        echo 'Nincs elegendő pénze megrakni a fogadást!';
      }
    } else {
      echo 'valami nem jó!';
    }
  } else {
    echo 'Nem vagy bejelentkezve!';
  }
}
?>

<form method="post">
  <div id="betModal" class="modal">
    <div class="modal-content">
      <h2 id="betModalTitle"></h2>
      <p>Válassz összeget:</p>
      <input type="number" id="betAmount" name="betAmount" min="50" max="10000000">
      <input type="hidden" id="fid" name="fid">
      <input type="hidden" id="odd" name="odd">
      <button name="kuld" id="kuld">Küldés</button>
      <button id="closebtn">&times;</button>
    </div>
  </div>
</form>

<main>
  <div class="kozos">

    <div class="meccsek" id="meccsek">
      <div class="grid-container">
        <div class="col1" id="refresh1">

        </div>
        <div class="col2" id="refresh2">
          <h1>Meccs adatai mindjárt frissülnek.</h1>
        </div>
        <div class="col3" id="refresh3">

        </div>
      </div>
    </div>
    <div class="meccsek2">
      <h1>Szorzók</h1>    
      <div class="grid-container-szorzok">
        <div class="col1-szorzok">

          <span id="refresh4">

          </span>
        </div>
        
        <div class="col2-szorzok">
          <span id="refresh5">
          </span>

        </div>
        <div class="col3-szorzok">
          <span id="refresh6">

          </span>
        </div>
      </div>
    </div>
  </div>
  <script src="proba.js"></script>
</main>

<?php include('footer.php'); ?>
<script>
  function refresh() {
    for (let index = 1; index < 7; index++) {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function () {
        document.getElementById("refresh" + index).innerHTML = this.responseText;
      }
      xhttp.open("GET", "content/content" + index + ".php");
      xhttp.send();
    }
  }
  refresh();
  setInterval(function () {
    refresh();
  }, 500);
</script>