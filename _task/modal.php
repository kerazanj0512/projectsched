<!-- Modal naman sa Equipment -->

<div class="modal" id="myModal_equipment">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

      <form class="form-horizontal" method="POST" action="emp_fileadd.php" enctype="multipart/form-data">
     
          		  <div class="form-group">
                  	<label class="col-sm-3 control-label">Utilize Hour</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="filename" name="filename" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label class="col-sm-3 control-label">Rent per Hour</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="filename" name="filename" required>
                  	</div>
                </div>

                <div class="form-group">
                  	<label class="col-sm-3 control-label">Total Cost</label>

                  	<div class="col-sm-9">
                    	<input type="number" class="form-control" id="filename" name="filename" required>
                  	</div>
                </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-flat" name="update"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div>

    </div>
  </div>
</div>
