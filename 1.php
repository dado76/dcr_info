

      <?php
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=dcr_info', 'root', '', $pdo_options);
      $sql = "SELECT * FROM carte_sims";
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

      $sql2 = "SELECT * FROM carte_sims WHERE statut='EN STOCK'";
      $req2 = $bdd->prepare($sql2);
      $req2->execute();
      $array2 = $req2->fetchALL();
      $nbbalisestock = count($array2);
      ?>
      <?php


  

      $sql4 = "SELECT * FROM carte_sims WHERE navigation='OUI'";
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
    <div class="w3-container w3-third">
      <h5 class="w3-bottombar w3-border-blue">Bilan Géolocalisation</h5>
      <td><i class="fa fa-database w3-text-blue w3-large"></i></td>
      <td>Etat de la base donnée.</td>
      <td><i><font color='green'><?php if(isset($nb)) {   echo "En ligne";  ?></font><font color='blue'> <?php  }else  { echo "Hors ligne"; } ?> </font></i></td>
    </tr>
    <br>
    <tr>
      <td><i class="fa fa-map-marker w3-text-blue w3-large"></i></td>
      <td>Nombre de balise.</td>
      <td><i> <?php echo $nb ?></i></td>
    </tr>
    <br>
    <tr>
      <td><i class="fa fa-microchip w3-text-blue w3-large"></i></td>
      <td>Configurer RFID.</td>
      <td><i> <?php echo $nbRFID ?></i></td>
    </tr>
    <br>
    <tr>
      <td><i class="fa fa-check-circle w3-text-blue w3-large"></i></td>
      <td>Balise en fonction.</td>
      <td><i><?php echo $nbbalise ?></i></td>
    </tr>
    <br>
    <tr>
      <td><i class="fa fa-street-view w3-text-blue w3-large"></i></td>
      <td>Utilisant la navigation.</td>
      <td><i><?php echo $nbbalisenav ?></i></td>
    </tr>
<br>
    <tr>
      <td><i class="fa fa-archive w3-text-blue w3-large"></i></td>
      <td>Balise en stock.</td>
      <td><i><?php echo $nbbalisestock ?></i></td>
    </tr>
  </table>
    </div>
