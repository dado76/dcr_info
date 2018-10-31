<?php
include('../db.php');
include('../balise/function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM carte_sims ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE codification LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR balise LIKE "%'.$_POST["search"]["value"].'%" ';
		$query .= 'OR telephone LIKE "%'.$_POST["search"]["value"].'%" ';
			$query .= 'OR sim LIKE "%'.$_POST["search"]["value"].'%" ';
					$query .= 'OR idport LIKE "%'.$_POST["search"]["value"].'%" ';
					$query .= 'OR immatriculation LIKE "%'.$_POST["search"]["value"].'%" ';
						$query .= 'OR statut LIKE "%'.$_POST["search"]["value"].'%" ';
								$query .= 'OR rfid LIKE "%'.$_POST["search"]["value"].'%" ';
											$query .= 'OR navigation LIKE "%'.$_POST["search"]["value"].'%" ';
														$query .= 'OR origin LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY codification ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$image = '';
	if($row["image"] != '')
	{
		$image = '<a href="../upload/'.$row["image"].'" "><img src="../test.jpg" height="30" width="30"> <a/>';
	}
	else
	{
		$image = '';
	}
	$sub_array = array();

	$sub_array[] = $row["codification"];
	$sub_array[] = $row["balise"];
	$sub_array[] = $row["sim"];
	$sub_array[] = $row["telephone"];
  $sub_array[] = $row["idport"];
	$sub_array[] = $row["immatriculation"];
	$sub_array[] = $row["statut"];
	$sub_array[] = $row["rfid"];
	$sub_array[] = $row["image"];
	$sub_array[] = $row["origin"];
	$sub_array[] = '<a id="'.$row["id"].'" class="btn  btn-xs update"><img src="../edit-icon.png" height="30" width="30"> <a/>';
	$sub_array[] = '<a id="'.$row["id"].'" class="btn  btn-xs delete"><img src="../edit_delete.png" height="30" width="30"> <a/>';
	$sub_array[] = $image;
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>
