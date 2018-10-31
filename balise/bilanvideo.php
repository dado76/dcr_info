<?php
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $bdd = new PDO('mysql:host=localhost;dbname=dcr_info', 'root', '', $pdo_options);
$sql = "SELECT * FROM video";
$req = $bdd->prepare($sql);
$req->execute();
$array = $req->fetchALL();
$nb = count($array);
?>
<?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=dcr_info', 'root', '', $pdo_options);

$servicebalise = "SELECT * FROM carte_sims WHERE statut='EN SERVICE'";
$requetebalise = $bdd->prepare($servicebalise);
$requetebalise->execute();
$arraybalise = $requetebalise->fetchALL();
$nbbalise = count($arraybalise);
?>
<?php

$sql2 = "SELECT distinct site from video";
$req2 = $bdd->prepare($sql2);
$req2->execute();
$array2 = $req2->fetchALL();
$nbbalisestock = count($array2);

?>
<?php

$sql3 = "SELECT * FROM carte_sims WHERE LC='TERBERG'";
$req3 = $bdd->prepare($sql3);
$req3->execute();
$array3 = $req3->fetchALL();
$nbbaliseterberg = count($array3);
?>
<?php

$sql4 = "SELECT * FROM video WHERE equipement LIKE 'CAPTEUR%'";
$req4 = $bdd->prepare($sql4);
$req4->execute();
$array4 = $req4->fetchALL();
$nbbalisenav = count($array4);
?>
<?php

$sql5 = "SELECT * FROM video WHERE equipement LIKE 'CAMERA%'";
$req5 = $bdd->prepare($sql5);
$req5->execute();
$array5 = $req5->fetchALL();
$nbRFID = count($array5);
?>
<div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px; width:20px;">


      <div class="w3-twothird">
        <h5>Bilan des équipement de video protection :</h5>
        <table class="w3-table w3-striped w3-white">
          <tr>
            <td><i class="fa fa-database w3-text-blue w3-large"></i></td>
            <td>Etat de la base donnée.</td>
            <td><i><font color='green'><?php if(isset($nb)) {   echo "En ligne";  ?></font><font color='red'> <?php  }else  { echo "Hors ligne"; } ?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-archive w3-text-blue w3-large"></i></td>
            <td>Nombre d'équipement .</td>
            <td><i><?php echo $nb?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-shield w3-text-blue w3-large"></i></td>
            <td>Capteur.</td>
            <td><i><?php echo $nbbalisenav?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-file-video-o w3-text-blue w3-large"></i></td>
            <td>Camera.</td>
            <td><i><?php echo $nbRFID?></i></td>
          </tr>
          <tr>
            <td><i class="fa fa-building w3-text-blue w3-large"></i></td>
            <td>Nombre de site.</td>
            <td><i><?php echo $nbbalisestock ?> </i></td>
          </tr>


        </table>
      </div>
    </div>
  </div>
  <hr>
