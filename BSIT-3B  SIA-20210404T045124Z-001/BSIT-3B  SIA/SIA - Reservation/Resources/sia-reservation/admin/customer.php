<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php include('model/model_customer.php'); ?>
<?php
    $data = new Data_customer();
   if(isset($_POST['delete'])){
        $ids = isset($_POST['check']) ? $_POST['check']:null;
        $data->delete_multiple($ids, $con);   
    }else if(isset($_POST['activate'])){
       $id = $_POST['customer_id'];
       $data->activate_customer($id,$con);
   }else if(isset($_POST['deactivate'])){
       $id = $_POST['customer_id'];
       $data->deactivate_customer($id,$con);
   }
    $customer = $data->get_customers($con);
    if(isset($_GET['filter'])){
        $filter = $_GET['filter'];
            $customer = $data->get_customer_byfilter($filter,$con);
    }
    
?>
<title>Customers</title>
<div class="span9">
    <div class="content">
        <div class="module message">
            <div class="module-head">
                <h3>Customer Management</h3>
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
                            <li><a href="customer.php">All</a></li>
                            <li><a href="customer.php?filter=1">Active</a></li>
                            <li><a href="customer.php?filter=0">Inactive</a></li>                           
                        </ul>
                    </div>
                </div>            
                <div class="pull-right">                    
                    <button type="button" data-toggle="modal" data-target="#delete_modal" class="btn btn-danger" name="delete_room">Delete</button>
                    
                </div>
            </div>
            <div class="module-body table">    
                <form method="POST">   
                <?php include('modal/modal_confirm.php'); ?> 
                <input type="hidden" value="" id="activate" name="customer_id" />
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $customer->fetch_object()): ?>
                        <tr class="gradeX">
                            <td><input type="checkbox" class="inbox-checkbox" name="check[]" value="<?php echo $row->id;?>"></td>
                            <td>
                                <?php $fullname = $row->fname.' '.$row->mname[0].'. '.$row->lname; ?>
                                <a href="edit_customer.php?id=<?php echo $row->id;?>"><?php echo $fullname;?></a>
                            </td>
                            <td><?php echo $row->address;?></td>
                            <td><?php echo $row->contact;?></td>
                            <td><?php echo $row->email;?></td>
                            <td><?php echo $row->username;?></td>
                            <td>
                                <?php if($row->status==1) echo '<a href="#deactivate_modal" data-toggle="modal" data-id='.$row->id.' class="activate" style="color:green;">Active</a>'; ?>
                                <?php if($row->status==0) echo '<a href="#activate_modal" data-toggle="modal" data-id='.$row->id.' class="activate" style="color:red;">Inactive</a>'; ?>
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
    <?php if(isset($_POST['activate'])) echo '$.jGrowl("Activated Successfully!");'; ?>
    <?php if(isset($_POST['deactivate'])) echo '$.jGrowl("Deactivated Successfully!");'; ?>
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
<script>
    $('.activate').on('click',function(){
        var id = $(this).data('id');
        $('#activate').val(id);
    });
</script>
</body>
</html>