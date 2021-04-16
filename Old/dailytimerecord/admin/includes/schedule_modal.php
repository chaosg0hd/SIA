<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<h4 class="modal-title"><b style="font-family:'Courier New', Courier, monospace;" >Add Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_add.php">
          		  <div class="form-group">
                  	<label style="font-family:'Courier New', Courier, monospace;" for="time_in" class="col-sm-3 control-label">Time In</label>

                  	<div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                    	 <input type="text" class="form-control timepicker" id="time_in" name="time_in" required>
                      </div>
                  	</div>
                </div>
                <div class="form-group">
                    <label style="font-family:'Courier New', Courier, monospace;" for="time_out" class="col-sm-3 control-label">Time Out</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="time_out" name="time_out" required>
                      </div>
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
            	<h4 class="modal-title"><b style="font-family:'Courier New', Courier, monospace;">Update Schedule</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_edit.php">
            		<input type="hidden" id="timeid" name="id">
                <div class="form-group">
                    <label style="font-family:'Courier New', Courier, monospace;" for="edit_time_in" class="col-sm-3 control-label">Time In</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="edit_time_in" name="time_in">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label style="font-family:'Courier New', Courier, monospace;" for="edit_time_out" class="col-sm-3 control-label">Time out</label>

                    <div class="col-sm-9">
                      <div class="bootstrap-timepicker">
                        <input type="text" class="form-control timepicker" id="edit_time_out" name="time_out">
                      </div>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button style="font-family:'Courier New', Courier, monospace;" type="submit" class="btn btn-success btn-flat" name="edit"> UPDATE</button>
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
            	<h4 class="modal-title"><b style="font-family:'Courier New', Courier, monospace;">Deleting...</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="schedule_delete.php">
            		<input type="hidden" id="del_timeid" name="id">
            		<div class="text-center">
	                	<p style="font-family:'Courier New', Courier, monospace;" >DELETE SCHEDULE</p>
	                	<h2 id="del_schedule" class="bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
            	<button style="font-family:'Courier New', Courier, monospace;" type="submit" class="btn btn-danger btn-flat" name="delete"> DELETE</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


     