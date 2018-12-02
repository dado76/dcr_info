<?php
include('../db.php');
include('function.php');
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
			INSERT INTO video (site, code, equipement, numeroserie, repere, dateinstallation, dureegaranti, ips, mac, image)
			VALUES (:site, :code, :equipement, :numeroserie, :repere, :dateinstallation, :dureegaranti, :ips, :mac, :image)
		");
		$result = $statement->execute(
			array(
				':site'	=>	$_POST["site"],
				':code'	=>	$_POST["code"],
				':equipement'	=>	$_POST["equipement"],
				':numeroserie'	=>	$_POST["numeroserie"],
				':repere'	=>	$_POST["repere"],
				':dateinstallation'	=>	$_POST["dateinstallation"],
	     	':dureegaranti'	=>	$_POST["dureegaranti"],
				':ips'	=>	$_POST["ips"],

				':mac'	=>	$_POST["mac"],

				':image'		=>	$image,
								':id'			=>	$_POST["user_id"]
				
				
			)
		);
		if(!empty($result))
		{
			echo 'Données Ajoutées';
		}
	}
	if($_POST["operation"] == "Modifier")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = '';
		}

		$statement = $connection->prepare(
			"UPDATE video
			SET site = :site, code = :code, equipement = :equipement, numeroserie = :numeroserie, repere = :repere, dateinstallation = :dateinstallation, dureegaranti = :dureegaranti, ips = :ips, mac = :mac, image = :image
			WHERE id = :id
			"
				);
		$result = $statement->execute(
			array(
				':site'	=>	$_POST["site"],
				':code'	=>	$_POST["code"],
				':equipement'	=>	$_POST["equipement"],
				':numeroserie'	=>	$_POST["numeroserie"],
				':repere'	=>	$_POST["repere"],
				':dateinstallation'	=>	$_POST["dateinstallation"],
	     	':dureegaranti'	=>	$_POST["dureegaranti"],
				':ips'	=>	$_POST["ips"],

				':mac'	=>	$_POST["mac"],

				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Données Sauvegardée';
		}
	}
}

?>
