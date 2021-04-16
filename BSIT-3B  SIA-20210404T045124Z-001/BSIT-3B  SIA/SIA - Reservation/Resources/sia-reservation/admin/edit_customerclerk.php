<?php 
    if(!isset($_GET['id'])){
        header('location:index.php');   
    }
?>
<?php include('include/header.php'); ?>
<?php include('include/sidebarclerk.php'); ?>
<?php include('model/model_customer.php'); ?>
<?php
    $data = new Data_customer();    
    $id = $_GET['id'];

    if(isset($_POST['update_customer'])){
        $post = $_POST;
        $data->update_customer($id,$post,$con);
    }

    $row = $data->get_customer_byID($id,$con);   
?>
<title>Edit Room</title>
<div class="span9">
    <div class="content">

        <div class="module">
            <div class="module-head">
                <h3>Customer Room</h3>
            </div>
            <div class="module-body">                    
                    <form class="form-horizontal row-fluid" method="post"> 
                        <?php include('modal/modal_confirm.php');?>    
                        <div class="control-group">
                            <label class="control-label" for="fname">First Name</label>
                            <div class="controls">
                                <input type="text" name="fname" autofocus class="span7" value="<?php echo $row->fname; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="mname">Middle Name</label>
                            <div class="controls">
                                <input type="text" name="mname" class="span7" value="<?php echo $row->mname; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="lname">Last Name</label>
                            <div class="controls">
                                <input type="text" name="lname" class="span7" value="<?php echo $row->lname; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="address">Address</label>
                            <div class="controls">
                                <input type="text" name="address" class="span7" value="<?php echo $row->address; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="contact">Contact</label>
                            <div class="controls">
                                <input type="text" name="contact" class="span7" value="<?php echo $row->contact; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="email">Email</label>
                            <div class="controls">
                                <input type="email" name="email" class="span7" value="<?php echo $row->email; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="company">Company</label>
                            <div class="controls">
                                <input type="text" name="company" class="span7" value="<?php echo $row->company; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="designation">Designation</label>
                            <div class="controls">
                                <input type="text" name="designation" class="span7" value="<?php echo $row->designation; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="dob">Date of Birth</label>
                            <div class="controls">
                                <input type="date" name="dob" class="span7" value="<?php echo $row->dob; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="username">Username</label>
                            <div class="controls">
                                <input type="text" name="username" class="span7" value="<?php echo $row->username; ?>">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="password">Set New Password</label>
                            <div class="controls">
                                <input type="password" name="password" class="span7" value="">                        
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <a href="customer.php" class="btn btn-default">Back</a>
                                <button type="submit" class="btn btn-primary" name="update_customer">Update</button>
                            </form>                            
                            </div>
                        </div>
            </div>
        </div>



    </div><!--/.content-->
</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php'); ?>
<script type="text/javascript">
    <?php if(isset($_POST['update_customer'])) echo '$.jGrowl("Updated Successfully!");'; ?>
    <?php if(isset($_GET['remove'])) echo '$.jGrowl("Removed Successfully!");'; ?>
</script>

</body>
</html>