<?php include('include/header.php'); ?>
<link rel="stylesheet" href="css/jgrowl/jquery.jgrowl.min.css" />
<?php include('include/sidebar.php'); ?>
<?php include('model/model_room.php'); ?>
<?php
    $data = new Data_room();
    if(isset($_POST['add_room'])){
        $data->add_room($_POST, $_FILES, $con); 
    }
    $type = $data->get_room_type($con);
?>

<div class="span9">
    <div class="content">
        
        <div class="module">
            <div class="module-head">
                <h3>Add New Room</h3>
            </div>
            <div class="module-body">                    
                    <form class="form-horizontal row-fluid" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <label class="control-label" for="name">Room Name</label>
                            <div class="controls">
                                <input type="text" name="name" autofocus class="span8" required>                        
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Description</label>
                            <div class="controls">
                                <textarea class="span8" rows="5" name="desc" required></textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Type</label>
                            <div class="controls">
                                <select required tabindex="1" data-placeholder="Select here.." class="span8" name="type">
                                    <?php while($row = $type->fetch_object()): ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name.' ('.$row->type.')';?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        
                         <div class="control-group">
                            <label class="control-label" for="basicinput">Capacity</label>
                            <div class="controls">

                                <select tabindex="1" data-placeholder="Select here.." class="span8" name="capacity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="name">Rate</label>
                            <div class="controls">
                                <input type="text" name="rate" autofocus class="span8">                        
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="basicinput">Status</label>
                            <div class="controls">
                                <select tabindex="1" data-placeholder="Select here.." class="span8" name="status">
                                    <option value="1">Available</option>
                                    <option value="2">Occupied</option>
                                    <option value="3">Reserved</option>
                                    <option value="4">Under Renovation</option>         
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Images</label>
                            <div class="controls">
                                <input type="file" name="gallery[]" accept="image/jpeg" multiple class="form-control" >
                            </div>                            
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <a href="rooms.php" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary" name="add_room">Submit</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>



    </div><!--/.content-->
</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php'); ?>
<script type="text/javascript">
    <?php if(isset($_POST['add_room'])) echo '$.jGrowl("Added Successfully!");'; ?>
</script>

</body>
</html>