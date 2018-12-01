<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP CRUD Operation using PDO with Bootstrap/Modal</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h2>Suivis hebdomadaire des anomalies Tripratik</h2>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
		
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> New</a>
            <?php
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
	<form action ="" method="post">
	<?php		
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=localhost;dbname=dcr_info', 'root', '', $pdo_options);
    try{

    $sql1 = "SELECT DISTINCT Dates FROM anomalie_tripratik ORDER BY Dates";
    $prepare = $bdd->prepare($sql1);
    $prepare->execute();
    //on stocke le résultat de la requête dans un array
    $arrListe = $prepare->fetchall();
    } catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
    }
    ?>
    <?php
    Error_reporting(0);
    // pour faire un menu déroulant présenter les différentes rubriques
    echo "<select name='Dates' onChange='FocusObjet()'>";
    echo "<OPTION SELECTED VALUE='TOUS'>TOUS</OPTION>";

    foreach($arrListe as $L) {
       $rbp = $L['Dates'];
       echo "<OPTION VALUE='$rbp'> $rbp </OPTION>\n";
    }
    echo "</select>";
    $today= $_POST['Dates'];
echo $today;
    ?>

    </input>
<?php 
header('Location: index.php'); 
?>
	<input type = "submit" value = "Envoyer">

	</form>
			<table class="table table-bordered table-striped" style="margin-top:20px;">
				<thead>
					<th>ID</th>
					<th>Date</th>
					<th>Commune</th>
					<th>Addresse</th>
					<th>OM</th>
					<th>CS</th>
					<th>BIO</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php
						//include our connection
						include_once('connection.php');
$today= date("Y-m-d");
echo  $today;
						$database = new Connection();
    					$db = $database->open();
						try{
						    $sql = "SELECT * FROM anomalie_tripratik WHERE Dates='$today'";
						    foreach ($db->query($sql) as $row) {
						    	?>
						    	<tr>
						    		<td><?php echo $row['id']; ?></td>
						    		<td><?php echo $row['Dates']; ?></td>
						    		<td><?php echo $row['Commune']; ?></td>
						    		<td><?php echo $row['Adresse']; ?></td>
									<td><?php echo $row['OM']; ?></td>
						    		<td><?php echo $row['CS']; ?></td>
						    		<td><?php echo $row['BIO']; ?></td>
						    		<td>
						    			<a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Edit</a>
						    			<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</a>
						    		</td>
						    		<?php include('edit_delete_modal.php'); ?>
						    	</tr>
						    	<?php
						    }
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						//close connection
						$database->close();

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('add_modal.php'); ?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
