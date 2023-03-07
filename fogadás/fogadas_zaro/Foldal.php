<?php include('header.php'); include('database.php');
$sql2 = "SELECT * FROM meccs_eredmeny ORDER BY meccs_id DESC LIMIT 1;";
$result =  $db->RunSQL($sql2)->fetch_assoc();
$gollovo = explode(",", $result['gol_szerzo']);
$pieces = explode("-",$result['eredmeny']);

$sql = "SELECT DISTINCT nemzetek.nemzet_nev FROM nemzetek INNER JOIN meccs_eredmeny ON meccs_eredmeny.hazai_id = nemzetek.nemzet_id WHERE nemzetek.nemzet_id = ?";
$hazainev = $db->RunSQLPrms($sql, "i", $result['hazai_id']);

$sql3 = "SELECT DISTINCT nemzetek.nemzet_nev FROM nemzetek INNER JOIN meccs_eredmeny ON meccs_eredmeny.hazai_id = nemzetek.nemzet_id WHERE nemzetek.nemzet_id = ?";
$vendegnev = $db->RunSQLPrms($sql3, "i", $result['vendeg_id']);

$sql4 = "SELECT * FROM `jatekosok` WHERE `nemzet_id` = ?";
$jatekosokhazai = $db->RunSQLPrms($sql4, "i", $result['hazai_id']);

$sql5 = "SELECT * FROM `jatekosok` WHERE `nemzet_id` = ?";
$jatekosokvendeg = $db->RunSQLPrms($sql5, "i", $result['vendeg_id']); 

$sql6 = "SELECT fogadas_neve, szorzo FROM `fogadasi_lehetoseg`  ";
$result2 =  $db->RunSQL($sql6)->fetch_all();


?>
<div class="row">
<main >
  <div class="kozos">
    
 
    <div class="meccsek" id="meccsek">
      <div class="grid-container">
        <div class="col1">
          <h1><?php print_r($pieces[0]);?></h1>
          <h2><?php print_r($hazainev->fetch_assoc()['nemzet_nev']);?></h2>
          <h2>Játékosok:</h2>
         
          <?php
        foreach ($jatekosokhazai->fetch_all() as $key => $value) {
            echo "<tr><td><h4>".$value[1]."</h4></td></tr>";
        }?> 

      </div>
        <div class="col2">
          <h1>---</h1>
          <h2>Eredmények</h2>
          <h2>Gólszerzők:</h2>
          <?php
        foreach ($gollovo as $key => $value) {
          echo "<tr><td><h4>".$value."</h4></td></tr>";
        }?> 
        </div>
        <div class="col3">
          <h1><?php print_r($pieces[1]);?></h1>
          <h2><?php print_r($vendegnev->fetch_assoc()['nemzet_nev']);?></h2>
          <h2>Játékosok:</h2>
          <?php
        foreach ($jatekosokvendeg->fetch_all() as $key => $value) {
            echo "<tr><td><h4>".$value[1]."</h4></td></tr>";
        }?> 
        </div>
      </div>

    </div>
    <div class="meccsek2"> 
       <h1>Szorzók</h1>
      <div class="grid-container-szorzok">  
      <div class="col1-szorzok">
      <h2>Hazai:</h2>
        <?php      
        $odd = $result2[0][1];
        $value = $result2[0][0];
        $value2 = $result2[0][1];
        echo '<div class="bet-box" onclick="openBetModal(\'Hazai\','.$odd.')">
                <h4>'.$value. " - " . $value2.'</h4>
              </div>';    

    ?> 
      </div> 
      <div class="col2-szorzok">
        <h2>Közös:</h2>
      <?php
       $value = $result2[2][0];
       $odd = $result2[2][1];
       $value2 = $result2[2][1];
       echo '<div class="bet-box" onclick="openBetModal(\'Döntetlen\','.$odd.')">
               <h4>'.$value. " - " . $value2.'</h4>
             </div>';    
    ?> 
      </div>
      <div class="col3-szorzok">
      <h2>Vendég:</h2>
      <?php
        $value = $result2[1][0];
        $odd = $result2[1][1];
        $value2 = $result2[1][1];
        echo '<div class="bet-box"onclick="openBetModal(\'Vendég\','.$odd.')">
                <h4>'.$value. " - " . $value2.'</h4>
              </div>';        
    ?> 
      </div>
<div id="betModal" class="modal">
  <div class="modal-content" >
    <h2 id="betModalTitle"></h2>
    <p>Válassz összeget:</p>
    <input type="number" id="betAmount" min="1" max="1000">
    <button >Küldés</button>
    <span class="close">&times;</span>
  </div>
</div>
</div>
    </div>
</div>

</main>

</div>
   
<?php include('footer.php')?>
