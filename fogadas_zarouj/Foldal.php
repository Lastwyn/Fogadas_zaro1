<?php include('header.php');
?>
<script>
  setInterval(function() {
    for (let index = 1; index < 7; index++) {
      const buffer = $("#refresh" + index);
      buffer.empty();
      buffer.load("content/content"+index+".php");
    }

  }, 10000);
</script>

<div id="betModal" class="modal">
  <div class="modal-content">
    <h2 id="betModalTitle"></h2>
    <p>Válassz összeget:</p>
    <input type="number" id="betAmount" min="1" max="1000">
    <button>Küldés</button>
    <button id="closebtn">&times;</button>
  </div>
</div>

<main>
  <div class="kozos">

    <div class="meccsek" id="meccsek">
      <div class="grid-container">
        <div class="col1" id="refresh1">
   
        </div>
        <div class="col2" id="refresh2">
          <h1>A következő meccs hamarosan indul.</h1>
        </div>
        <div class="col3" id="refresh3">

        </div>
      </div>
    </div>
    <div class="meccsek2">
      <h1>Szorzók</h1>
      <div class="grid-container-szorzok">
        <div class="col1-szorzok">
          <h2>Hazai:</h2>
          <span id="refresh4">

          </span>
        </div>
        <div class="col2-szorzok">
          <h2>Közös:</h2>
          <span id="refresh5">
          </span>
        </div>

        <div class="col3-szorzok">
          <h2>Vendég:</h2>
          <span id="refresh6">

          </span>
        </div>
      </div>
    </div>
  </div>
  <script src="proba.js"></script>
</main>

<?php include('footer.php');?>