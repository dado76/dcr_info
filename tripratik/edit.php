<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_GET['id'];
			$Dates = $_POST['Dates'];
			$Commune = $_POST['Commune'];
			$Adresse = $_POST['Adresse'];
			$OM = $_POST['OM'];
			$CS = $_POST['CS'];
			$BIO = $_POST['BIO'];

			$sql = "UPDATE anomalie_tripratik  SET Dates = '$Dates', Commune = '$Commune', Adresse = '$Adresse', OM = '$OM', CS = '$CS', BIO = '$BIO' WHERE id = '$id'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Modifications effectués' : 'Erreur quelque chose ne va pas';

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Fill up edit form first';
	}

	header('location: index.php');

?>
