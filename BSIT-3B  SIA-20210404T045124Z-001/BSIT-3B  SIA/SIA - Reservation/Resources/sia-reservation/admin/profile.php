<?php include('include/header.php'); ?>
<link rel="stylesheet" href="css/jgrowl/jquery.jgrowl.min.css" />
<?php include('include/sidebar.php'); ?>
<title>Profile Management</title>
<?php
    if(isset($_POST['update_profile'])){
        $post = $_POST;
        $address = $post['address'];
        $contact = $post['contact'];
        $latitude = $post['latitude'];
        $longitude = $post['longitude'];
        $profile = nl2br($post['profile']);
        $policy = nl2br($post['policy']);
        $service = nl2br($post['service']);
        $q = "insert into tblprofile values(
                        null,
                        '$address',
                        '$contact',
                        '$latitude',
                        '$longitude',
                        '$profile',
                        '$policy',
                        '$service')";
        $con->query($q);
        $update_profile = true;
    }
    $q = "select * from tblprofile order by id desc";
    $row = $con->query($q)->fetch_object();
?>
<div class="span9">
    <div class="content">
        
        <div class="module">
            <div class="module-head">
                <h3>Profile Management</h3>
            </div>
            <div class="module-body">                    
                    <form class="form-horizontal row-fluid" method="post" enctype="multipart/form-data">                        
                        <div class="control-group">
                            <label class="control-label" for="name"><strong>COMPLETE ADDRESS</strong></label>
                            <div class="controls">
                                <input type="text" name="address" value="<?php echo @$row->address;?>" autofocus class="span8" required>                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="name"><strong>CONTACT</strong></label>
                            <div class="controls">
                                <input type="text" name="contact" value="<?php echo @$row->contact;?>" class="span8" required>                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="name"><strong>LATITUDE</strong></label>
                            <div class="controls">
                                <input type="text" name="latitude" value="<?php echo @$row->latitude;?>" class="span8" required>                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="name"><strong>LONGITUDE</strong></label>
                            <div class="controls">
                                <input type="text" name="longitude" value="<?php echo @$row->longitude;?>" class="span8" required>                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="basicinput"><strong>COMPANY PROFILE</strong></label>
                            <div class="controls">
                                <textarea class="ckeditor span8" rows="5" name="profile" required><?php echo @$row->profile;?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="basicinput"><strong>POLICIES</strong></label>
                            <div class="controls">
                                <textarea class="ckeditor span8" rows="5" name="policy" required><?php echo @$row->policy;?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="basicinput"><strong>SERVICES OFFERED</strong></label>
                            <div class="controls">
                                <textarea class="ckeditor span8" rows="5" name="service" required><?php echo @$row->service;?></textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <a href="index.php" class="btn btn-default">BACK</a>
                                <button type="submit" class="btn btn-primary" name="update_profile">UPDATE</button>
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
<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    <?php if(isset($update_profile)) echo '$.jGrowl("Updated Successfully!");'; ?>
</script>

</body>
</html>