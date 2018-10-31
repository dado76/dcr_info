

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
