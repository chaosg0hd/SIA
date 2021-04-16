<?php 
    if(!isset($_GET['id'])){
        header('location:index.php');   
    }else if(isset($_POST['delete'])){
        header('location:rooms.php?delete='.$_GET['id'].'');   
    }
?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('model/model_room.php'); ?>
<?php
    $data = new Data_room();    
    $id = $_GET['id'];

    if(isset($_POST['update_room'])){
        $post = $_POST;
        $data->update_room($id,$post,$_FILES,$con);
    }else if(isset($_GET['remove'])){
        $remove = $_GET['remove'];
        $data->delete_picture($remove,$con);
    }

    $room = $data->get_room_byID($id,$con);   
    $type = $data->get_room_type($con);  
    $images = $data->get_images($id,$con);
?>
<title>Edit Room</title>
<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Update Room</h3>
            </div>
            <div class="module-body">                    
                    <form class="form-horizontal row-fluid" method="post" enctype="multipart/form-data"> 
                        <?php include('modal/modal_confirm.php');?>    
                        <div class="control-group">
                            <label class="control-label" for="name">Room Name</label>
                            <div class="controls">
                                <input type="text" name="name" autofocus class="span8" value="<?php echo $room->name; ?>">                        
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Description</label>
                            <div class="controls">
                                <textarea class="span8" rows="5" name="desc"><?php echo $room->description; ?></textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Type</label>
                            <div class="controls">
                                <select required tabindex="1" data-placeholder="Select here.." class="span8" name="type">
                                    <?php while($row = $type->fetch_object()): ?>
                                    <option value="<?php echo $row->id; ?>" <?php if($row->id==$room->type) echo 'selected'; ?> ><?php echo $row->name; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        
                         <div class="control-group">
                            <label class="control-label" for="basicinput">Capacity</label>
                            <div class="controls">
                                <select required tabindex="1" data-placeholder="Select here.." class="span8" name="capacity">
                                    <option value="1" <?php if($room->capacity==1) echo 'selected';?> >1</option>
                                    <option value="2" <?php if($room->capacity==2) echo 'selected';?> >2</option>
                                    <option value="3" <?php if($room->capacity==3) echo 'selected';?> >3</option>
                                    <option value="4" <?php if($room->capacity==4) echo 'selected';?> >4</option>                                    
                                    <option value="5" <?php if($room->capacity==5) echo 'selected';?> >5</option>
                                    <option value="6" <?php if($room->capacity==6) echo 'selected';?> >6</option>
                                    <option value="7" <?php if($room->capacity==7) echo 'selected';?> >7</option>
                                    <option value="8" <?php if($room->capacity==8) echo 'selected';?> >8</option>
                                    <option value="9" <?php if($room->capacity==9) echo 'selected';?> >9</option>
                                    <option value="10" <?php if($room->capacity==10) echo 'selected';?> >10</option>
                                    <option value="11" <?php if($room->capacity==11) echo 'selected';?> >11</option>
                                    <option value="12" <?php if($room->capacity==12) echo 'selected';?> >12</option>
                                    <option value="13" <?php if($room->capacity==13) echo 'selected';?> >13</option>
                                    <option value="14" <?php if($room->capacity==14) echo 'selected';?> >14</option>
                                    <option value="15" <?php if($room->capacity==15) echo 'selected';?> >15</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="name">Rate</label>
                            <div class="controls">
                                <input type="text" name="rate" class="span8" value="<?php echo $room->rate; ?>">                        
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Status</label>
                            <div class="controls">
                                <select required tabindex="1" data-placeholder="Select here.." class="span8" name="status">
                                    <option value="1" <?php if($room->status==1) echo 'selected';?> >Available</option>
                                    <option value="2" <?php if($room->status==2) echo 'selected';?> >Occupied</option>
                                    <option value="3" <?php if($room->status==3) echo 'selected';?> >Reserved</option> 
                                    <option value="4" <?php if($room->status==4) echo 'selected';?> >Under Renovation</option> 
                                </select>  
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Add More Images</label>
                            <div class="controls">
                                <input type="file" name="gallery[]" accept="image/jpeg" multiple class="form-control" >
                            </div>                            
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <a href="rooms.php" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary" name="update_room">Update</button>
                            </form>
                                <button type="button" data-toggle="modal" data-target="#delete_modal" class="btn btn-danger" name="delete_room">Delete</button>
                            </div>
                        </div>
                        <hr />
                        <?php while($row = $images->fetch_object()): ?>                        
                        <div class="span2 text-center">                            
                            <div class="thumbnail">
                                <center><a href="edit_room.php?id=<?php echo $id;?>&remove=<?php echo $row->id;?>">[Remove]</a></center><br />
                                <img src="<?php echo 'images/rooms/thumbs/'.$row->path;?>" class="img-responsive">
                            </div>                            
                        </div>
                        <?php endwhile; ?>
                <div class="clearfix"></div>
            </div>
        </div>



    </div><!--/.content-->
</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php'); ?>
<script type="text/javascript">
    <?php if(isset($_POST['update_room'])) echo '$.jGrowl("Updated Successfully!");'; ?>
    <?php if(isset($_GET['remove'])) echo '$.jGrowl("Removed Successfully!");'; ?>
</script>

</body>
</html>