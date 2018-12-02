<html>
	<head>
		<title>Webslesson Demo - PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="../dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
			    <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome-free-5.4.1-web/css/all.min.css">
		<style>
			body
			{
				margin:0;
				pAjoutering:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:90%;

				background-color:#fff;
				border:1px solid #ccc;

				margin-top:25px;
			}

		</style>
	</head>
	<body>
		<div class="container box">
		  <header class="w3-container" style="padding-top:22px">

  </header>
 <center>






			<br />
			<div class="table-responsive">
				<br />
				<div align="center">
					<button type="button" id="Ajouter_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary btn"><i class="fa fa-plus"></i> Ajouter</button>
    		<a onclick="javascript:window.print()"><button type="button" id="Ajouter_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary btn"><i class="fa fa-print"></i> Imprimer</button></a>
			<a href="videoExport.php" target="_parent"><button type="button" href="videoExport.php" class="btn btn-primary btn"><i class="fa fa-file-excel"></i> Export</button></a>

<style>
   /*****TABLEAUUU****/
   table {
       font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
       border-collapse: collapse;

   }

   table tr:nth-child(even){background-color: #f2f2f2;}

   table tr:hover {background-color: #F7F8E0;}

   table th {
background-color: #2196F3;
color: white;
   }

</style>

				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="5%">Document</th>
							<th width="5%">site</th>
							<th width="5%">code</th>
							<th width="5%">equipement</th>
						    <th width="5%">numero de serie</th>
							<th width="5%">repere géograhique</th>
							<th width="5%">Date d'installation</th>
							<th width="5%">Duree de garantie</th>
							<th width="5%">Adresse IP</th>
							<th width="5%">MAC</th>
							<th width="5%">Modifier</th>
							<th width="5%">Supprimer</th>
						</tr>
					</thead>
				</table>

			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title">Ajouter une code</h4>
				</div>
				<div class="modal-body">
					<label>site</label>
					<input type="text" name="site" id="site" class="form-control" />
					<br />
					<label>code</label>
					<input type="text" name="code" id="code" class="form-control" />
					<br />
					<label>equipement</label>
					<input type="text" name="equipement" id="equipement" class="form-control" />
					<br />
					<label>numero de serie</label>
					<input type="text" name="numeroserie" id="numeroserie" class="form-control" />
					<br />
					<label>Repére géographique</label>
					<input type="text" name="repere" id="repere" class="form-control" />
					<br />
					<label>Date d'installation</label>
					<input type="text" name="dateinstallation" id="dateinstallation" class="form-control" />
					<br />
				<label>duree de garantie</label>
					<input type="text" name="dureegaranti" id="dureegaranti" class="form-control" />
					<br />
					<label>Adresse IP</label>
						<input type="text" name="ips" id="ips" class="form-control" />
						<br />
						<label>Adresse MAC  </label>
							<input type="text" name="mac" id="mac" class="form-control" />
							<br />
					<label>Selection du document</label>
					<input type="file" name="user_image" id="user_image" />
			<input type="image" src="../test.jpg" height="30" width="30"/>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Ajouter" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#Add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Ajouter code");
		$('#action').val("Ajouter");
		$('#operation').val("Ajouter");
		$('#user_uploaded_image').html('');
	});

	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
				"orderable":false,
			},
		],

	});



	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var firstName = $('#site').val();
		var lastName = $('#code').val();
		var equipement = $('#equipement').val();
		var numeroserie = $('#numeroserie').val();
		var repere = $('#repere').val();
		var dateinstallation = $('#dateinstallation').val();
		var dureegaranti = $('#dureegaranti').val();
		var ips = $('#ips').val();
		var mac = $('#mac').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['pdf','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}
		if(firstName != '' && lastName != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Tous les champs sont requis");
		}
	});

	$(document).on('click', '.Modifier', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#site').val(data.site)  ;
				$('#code').val(data.code);
				$('#equipement').val(data.equipement);
				$('#numeroserie').val(data.numeroserie);
				$('#repere').val(data.repere);
				$('#dateinstallation').val(data.dateinstallation);
				$('#dureegaranti').val(data.dureegaranti);
				$('#ips').val(data.ips);
				$('#mac').val(data.mac);
				$('.modal-title').text("Modifier Carte equipements");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Modifier");
				$('#operation').val("Modifier");
			}
		})
	});


	$(document).on('click', '.Supprimer', function(){
		var user_id = $(this).attr("id");
		if(confirm("Etes vous sur de vouloir supprimer?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;
		}
	});


});
</script>
