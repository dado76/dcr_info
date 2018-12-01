<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Dates:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="Dates">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Commune:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Commune">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Adresse:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Adresse">
					</div>
				</div>
								<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">OM:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="OM">
					</div>
				</div>
								<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">CS:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="CS">
					</div>
				</div>
								<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">BIO:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="BIO">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>
 
        </div>
    </div>
</div>