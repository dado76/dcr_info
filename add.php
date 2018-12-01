<?php
	session_start();
	include_once('connection.php');
 
	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//make use of prepared statement to prevent sql injection
			$stmt = $db->prepare("INSERT INTO anomalie_tripratik (Dates, Commune, Adresse,OM,CS,BIO) VALUES (:Dates, :Commune, :Adresse,:OM,:CS,:BIO)");
			//if-else statement in executing our prepared statement
			$_SESSION['message'] = ( $stmt->execute(array(':Dates' => $_POST['Dates'] , ':Commune' => $_POST['Commune'] , ':Adresse' => $_POST['Adresse'] , ':OM' => $_POST['OM'], ':CS' => $_POST['CS'], ':BIO' => $_POST['BIO'])) ) ? 'Member added successfully' : 'Something went wrong. Cannot add member';	
 
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}
 
		//close connection
		$database->close();
	}
 
	else{
		$_SESSION['message'] = 'Fill up add form first';
	}
 
	header('location: index.php');
 
?>