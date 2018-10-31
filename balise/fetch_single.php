<?php
include('../db.php');
include('../balise/function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM carte_sims
		WHERE id = '".$_POST["user_id"]."'
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["codification"] = $row["codification"];
		$output["balise"] = $row["balise"];
				$output["sim"] = $row["sim"];
						$output["telephone"] = $row["telephone"];
				$output["idport"] = $row["idport"];
								$output["statut"] = $row["statut"];
								$output["immatriculation"] = $row["immatriculation"];
								$output["rfid"] = $row["rfid"];
								$output["navigation"] = $row["navigation"];
										$output["origin"] = $row["origin"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="../upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>
