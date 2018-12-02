<?php
include('../db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM video ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE site LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR equipement LIKE "%'.$_POST["search"]["value"].'%" ';
}






if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY site ';
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
	$sub_array[] = $image;
	$sub_array[] = $row["site"];
	$sub_array[] = $row["code"];
	$sub_array[] = $row["equipement"];
	$sub_array[] = $row["numeroserie"];
	$sub_array[] = $row["repere"];
	$sub_array[] = $row["dateinstallation"];
	$sub_array[] = $row["dureegaranti"];
	$sub_array[] = $row["ips"];
		$sub_array[] = $row["mac"];
	$sub_array[] = '<a type="button" name="Modifier" id="'.$row["id"].'" class="btn btn-primary btn Modifier"><i class="fa fa-edit"></i> </a>';
	$sub_array[] = '<a type="button" name="Supprimer" id="'.$row["id"].'" class="btn btn-danger btn Supprimer"><i class="fa fa-close"></i> </a>';
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
