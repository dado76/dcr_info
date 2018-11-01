<html>
	<head>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script type="text/javascript" charset="utf8" src="../jquery.dataTables.js"></script>

		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<style>
			body
			{
				margin:0;

				background-color:#f1f1f1;
			}
			.box
			{
				width:100%;

				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;

			}
			 th
			{

				background-color:#2196F3;
				color: white;

			}
			table
			{
			color: black;

			}
		</style>
	</head>
	<body>
		<div class="container box">

			<br />
			<div class="table-responsive">
				<br />

					<center>

				<a href"" id="Ajouter" data-toggle="modal" data-target="#userModal"><img src="../add.png" height="50" width="50"><a/>


			<a  href="../balise/baliseExport.php"><img src="../ex.png" height="50" width="50"><a/>
					<a  href="../balise/baliseExport.php"><img src="../prin.png" height="50" width="50"><a/>
			</center>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>

							<th width="5%">Codification</th>
							<th width="10%">Balise</th>
							<th width="10%">Sim</th>
							<th width="10%">telephone</th>
							<th width="10%">ID et Port</th>
							<th width="10%">Immatriculation</th>
							<th width="10%">statut</th>
							<th width="10%">rfid</th>
							<th width="10%">navigation</th>
							<th width="10%">origin</th>
							<th width="5%">Edit</th>
							<th width="5%">supp</th>
							<th width="5%">Documents</th>

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
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Ajouter User</h4>
				</div>
				<div class="modal-body">
					<label>Enter CODIFICATION</label>
					<input type="text" name="codification" id="codification" class="form-control" />
					<br />
					<label>Enter balise</label>
					<input type="text" name="balise" id="balise" class="form-control" />
					<br />
					<label>Enter sim</label>
					<input type="text" name="sim" id="sim" class="form-control" />
					<br />
					<label>Enter telephone</label>
					<input type="text" name="telephone" id="telephone" class="form-control" />
					<br />
					<label>Enter ID et Port</label>
					<input type="text" name="idport" id="idport" class="form-control" />
							<br />
					<label>Immatriculation</label>
					<input type="text" name="immatriculation" id="immatriculation" class="form-control" />
					<br />
					<label>Statut</label>
					<input type="text" name="statut" id="statut" class="form-control" />
					<br />
					<label>Immatriculation</label>
					<input type="text" name="rfid" id="rfid" class="form-control" />
					<br />
					<label>Navigation</label>
					<input type="text" name="navigation" id="navigation" class="form-control" />
					<br />
					<label>Nom d'origine</label>
					<input type="text" name="origin" id="origin" class="form-control" />
					<br />
					<label> Image or pdf</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-Primary" value="Ajouter" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				</div>
			</div>
		</form>

	</div>


<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#Ajouter_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Ajouter balise");
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
				"targets":[0, 10, 11, 12],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var codification = $('#codification').val();
		var balise = $('#balise').val();
		var sim = $('#sim').val();
		var telephone = $('#telephone').val();
		var idport = $('#idport').val();
	var immatriculation = $('#immatriculation').val();
		var statut = $('#statut').val();
		var rfid = $('#rfid').val();
		var navigation = $('#navigation').val();
		var origin = $('#origin').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg', 'pdf']) == -1)
			{
				alert("Format d'image invalide 'gif','png','jpg','jpeg', 'pdf' Requis");
				$('#user_image').val('');
				return false;
			}
		}
		if(codification != '' && balise != '' && sim != '' && idport != '')
		{
			$.ajax({
				url:"../balise/insert.php",
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

	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"../balise/fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#codification').val(data.codification);
				$('#balise').val(data.balise);
				$('#sim').val(data.sim);
				$('#telephone').val(data.telephone);
				$('#idport').val(data.idport);
				$('#immatriculation').val(data.immatriculation);
				$('#statut').val(data.statut);
				$('#rfid').val(data.rfid);
				$('#navigation').val(data.navigation);
				$('#origin').val(data.origin);
				$('.modal-title').text("Modifier Carte sims");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Editer");
				$('#operation').val("Edit");
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Etes vous sur de vouloir supprimer ?"))
		{
			$.ajax({
				url:"../balise/delete.php",
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
