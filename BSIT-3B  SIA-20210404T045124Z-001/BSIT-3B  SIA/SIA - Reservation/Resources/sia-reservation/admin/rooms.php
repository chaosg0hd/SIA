<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('model/model_room.php'); ?>
<title>Seats</title>
<?php
    $data = new Data_room();
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $data->delete_room($id,$con);           
    }else if(isset($_POST['delete'])){
        $ids = isset($_POST['check']) ? $_POST['check']:null;
        $data->delete_multiple($ids, $con);   
    }
    $room = $data->get_room($con);
?>

<div class="span9">
    <div class="content">
        <div class="module message">
            <div class="module-head">
                <h3>Seat Management</h3>
            </div>
            <div class="module-option clearfix">
                <div class="pull-left">
                    Filter : &nbsp;
                    <div class="btn-group">
                        <button class="btn">All</button>
                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">All</a></li>
                            <li><a href="#">Available</a></li>
                            <li><a href="#">Reserved</a></li>
                            <li><a href="#">Occupied</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Under Renovation</a></li>                            
                        </ul>
                    </div>
                </div>            
                <div class="pull-right">                    
                    <a href="add_room.php" title="New Room" class="btn btn-primary">Add Room</a>
                    <button type="button" data-toggle="modal" data-target="#delete_modal" class="btn btn-danger" name="delete_room">Delete</button>
                    
                </div>
            </div>
            <div class="module-body table">    
                <form method="POST">   
                <?php include('modal/modal_confirm.php'); ?>      
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Room</th>
                            <th>Type</th>
                            <th>Capacity</th>
                            <th>Rate</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $room->fetch_object()): ?>
                        <tr class="gradeX">
                            <td><input type="checkbox" class="inbox-checkbox" name="check[]" value="<?php echo $row->id;?>"></td>
                            <td><a href="edit_room.php?id=<?php echo $row->id;?>"><?php echo $row->name;?></a></td>
                            <td>
                                <?php $type = $data->get_type_name($row->type,$con);?>
                                <?php echo $type->name.' ('.$type->type.')'; ?>
                            </td>
                            <td><?php echo $row->capacity;?></td>
                            <td><?php echo $row->rate;?>
                                <?php if($type->type=='Dorm'){echo '/ head';}else{ echo '/ night';} ?>
                            </td>
                            <td>
                                <?php $data->check_room($row->id,$con); ?>
                                <?php if($row->status==1) echo '<font style="color:green;">Available</font>'; ?>
                                <?php if($row->status==2) echo '<font style="color:red;">Occupied</font>'; ?>
                                <?php if($row->status==3) echo '<font style="color:orange;">Reserved</font>'; ?>
                                <?php if($row->status==4) echo '<font style="color:blue;">Under Renovation</font>'; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>                    
                </table>
                </form>
            </div>
            <div class="module-foot">
            </div>
        </div>

    </div><!--/.content-->
</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php'); ?>
<script type="text/javascript">
    <?php if(isset($_GET['delete'])) echo '$.jGrowl("Deleted Successfully!");'; ?>
    <?php if(isset($_POST['delete'])) echo '$.jGrowl("Deleted Successfully!");'; ?>
</script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    } );
</script>
</body>
</html>