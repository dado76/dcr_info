<?php
include('../db.php');
include('../balise/function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Ajouter")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO carte_sims (codification, balise, telephone, sim, idport, immatriculation, statut, rfid, navigation, origin, image)
			VALUES (:codification, :balise, :telephone, :sim, :idport, :immatriculation, :statut, :rfid, :navigation, :origin, :image)
		");
		$result = $statement->execute(
			array(
				':codification'	=>	$_POST["codification"],
				':balise'	=>	$_POST["balise"],
				':telephone'	=>	$_POST["telephone"],
				':sim'	=>	$_POST["sim"],
				':idport'	=>	$_POST["idport"],
				':immatriculation'	=>	$_POST["immatriculation"],
				':statut'	=>	$_POST["statut"],
				':rfid'	=>	$_POST["rfid"],
				':navigation'	=>	$_POST["navigation"],
				':origin'	=>	$_POST["origin"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Donnée enregistrer';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE carte_sims
			SET codification = :codification, balise= :balise, telephone= :telephone, sim= :sim, idport= :idport, immatriculation= :immatriculation, statut= :statut, rfid= :rfid, navigation= :navigation, origin= :origin, image= :image
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':codification'	=>	$_POST["codification"],
				':balise'	=>	$_POST["balise"],
				':telephone'	=>	$_POST["telephone"],
				':sim'	=>	$_POST["sim"],
				':idport'	=>	$_POST["idport"],
				':immatriculation'	=>	$_POST["immatriculation"],
				':statut'	=>	$_POST["statut"],
				':rfid'	=>	$_POST["rfid"],
				':navigation'	=>	$_POST["navigation"],
				':origin'	=>	$_POST["origin"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Donnée sauvegarder';
		}
	}
}

?>
