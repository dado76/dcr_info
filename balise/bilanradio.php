
<div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px; width:20px;">
      <?php
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=dcr_info', 'root', '', $pdo_options);
      $sql = "SELECT * FROM radio";
      $req = $bdd->prepare($sql);
      $req->execute();
      $array = $req->fetchALL();
      $nb = count($array);
      ?>
      <?php
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      $bdd = new PDO('mysql:host=localhost;dbname=dcr_info', 'root', '', $pdo_options);

      $servicebalise = "SELECT * FROM radio WHERE statut='EN SERVICE'";
      $requetebalise = $bdd->prepare($servicebalise);
      $requetebalise->execute();
      $arraybalise = $requetebalise->fetchALL();
      $nbradio = count($arraybalise);
      ?>
      <?php

      $sql2 = "SELECT * FROM radio WHERE statut='EN STOCK'";
      $req2 = $bdd->prepare($sql2);
      $req2->execute();
      $array2 = $req2->fetchALL();
      $nbbalisestock = count($array2);
      ?>
      <?php

      $sql3 = "SELECT * FROM radio WHERE type='Fixe'";
      $req3 = $bdd->prepare($sql3);
      $req3->execute();
      $array3 = $req3->fetchALL();
      $nbbaliseterberg = count($array3);
      ?>
      <?php

      $sql4 = "SELECT * FROM radio WHERE type='Portatif'";
      $req4 = $bdd->prepare($sql4);
      $req4->execute();
      $array4 = $req4->fetchALL();
      $nbbalisenav = count($array4);
      ?>
      <?php

      $sql5 = "SELECT * FROM carte_sims WHERE RFID='OUI'";
      $req5 = $bdd->prepare($sql5);
      $req5->execute();
      $array5 = $req5->fetchALL();
      $nbRFID = count($array4);
      ?>


      <div class="w3-twothird">
        <h5>Bilan des radios :</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-database w3-text-blue w3-large"></i></td>
            <td>Etat de la base donnée.</td>
            <td><i><font color='green'><?php if(isset($nb)) {   echo "En ligne";  ?></font><font color='red'> <?php  }else  { echo "Hors ligne"; } ?> </font></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-microphone w3-text-blue w3-large"></i></td>
            <td>Nombre de radio.</td>
            <td><i><?php echo $nb ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-mobile w3-text-blue w3-large"></i></td>
            <td>Portatif.</td>
            <td><i> <?php echo   $nbbalisenav ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-phone w3-text-blue w3-large"></i></td>
            <td>Fixe.</td>
            <td><i><?php echo$nbbaliseterberg ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-check-circle w3-text-blue w3-large"></i></td>
            <td>En fonction.</td>
            <td><i><?php echo $nbradio ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-archive w3-text-blue w3-large"></i></td>
            <td>En stock.</td>
            <td><i><?php echo  $nbbalisestock ?></i></td>
          </tr>

        </table>
      </div>
    </div>
  </div>
  <hr>
