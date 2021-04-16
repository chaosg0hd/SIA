<?php include('include/header.php'); ?>
<link rel="stylesheet" href="css/jgrowl/jquery.jgrowl.min.css" />
<?php include('include/sidebar.php'); ?>
<?php
    require_once('backup_restore.class.php'); 

    $newImport = new backup_restore($host,$db,$user,$pass);

    if(isset($_GET['process'])){
        $process = $_GET['process'];
        if($process == 'backup'){
            $message = $newImport -> backup ();   
        }else if($process == 'restore'){
            $message = $newImport -> restore (); 
            @unlink('backup/database_'.$db.'.sql');
            
        }
    }
    if(isset($_POST['submit'])){        
        $db = 'database_'.$db.'.sql';
        $target_path = 'backup';
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_path . '/' . $db);    
        $message = 'Successfully uploaded. You can now <a href=backup.php?process=restore>restore</a> the database!';
    }
?>



<div class="span9">
    <div class="content">
        
        <div class="module">
            <div class="module-head">
                <h3>Backup / Restore Database</h3>
            </div>
            <div class="module-body">
                
             
                        <?php if(isset($_GET['process'])): ?>
                            <?php 
                                $msg = $_GET['process'];   
                                $class = 'text-center';
                                switch($msg){
                                    case 'backup':
                                        $msg = 'Backup successful!<br />Download THE <a href=backup/'.$message.' target=_blank >SQL FILE </a> OR RESTORE IT ANY TIME'; 
                                        break;
                                    case 'restore':
                                        $msg = $message; 
                                        break;
                                    case 'upload':
                                        $msg = $message; 
                                        break;
                                    default:
                                        $class = 'hide';
                                }                                
                            ?>
                            <div class="alert alert-info <?php echo $class;?>">
                                <strong><?php echo $msg; ?></strong>
                            </div>
                        <?php endif; ?>
                        
        
                
                <div class="row">
                    <div class="span12">
                        <div class="span3">
                            <a href="backup.php?process=backup">
                                <button type="button" class="btn btn-success btn-lg span4"><i class="fa fa-database"></i> BACKUP DATABASE</button>
                            </a>
                        </div>
                        <div class="span3">
                            <a href="backup.php?process=restore">
                                <button type="button" class="btn btn-info btn-lg span4"><i class="fa fa-database"></i> RESTORE DATABASE</button>
                            </a>
                        </div>                        
                    </div>
                </div>
                <br />
                <div class="upload alert alert-warning">
                <hr />
                    <form method="POST" enctype="multipart/form-data">
                        <label>Upload SQL File:</label>
                        <input type="file" name="file" class="form-control">
                        <input type="submit" name="submit" class="btn btn-success" value="Upload Database" />
                    </form>
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
    <?php if(isset($_POST['add_room'])) echo '$.jGrowl("Added Successfully!");'; ?>
</script>

</body>
</html>