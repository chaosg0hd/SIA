<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title"><b style="font-family:'Courier New', Courier, monospace;">Add Position</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="position_add.php">
          		  <div class="form-group">
                  	<label style="font-family:'Courier New', Courier, monospace;" for="title" class="col-sm-3 control-label">Position Title</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" id="title" name="title" required>
                  	</div>
                </div>
                
          	</div>
          	<div class="modal-footer">
            	<button style="font-family:'Courier New', Courier, monospace;" type="submit" class="btn btn-success btn-flat" name="add"> SAVE</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Update Position</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="position_edit.php">
            		<input type="hidden" id="posid" name="id">
                <div class="form-group">
                    <label for="edit_title" class="col-sm-3 control-label">Position Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_title" name="title">
                    </div>
                </div>
               
          	</div>
          	<div class="modal-footer">
            	<button type="submit" class="btn btn-success btn-flat" name="edit"> UPDATE</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Are you sure you want to Delete?</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="position_delete.php">
            		<input type="hidden" id="del_posid" name="id">
            		<div class="text-center">
	                	<p>Delete Position</p>
	                	<h2 id="del_position" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button type="submit" class="btn btn-danger btn-flat" name="delete"></i> Delete</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     