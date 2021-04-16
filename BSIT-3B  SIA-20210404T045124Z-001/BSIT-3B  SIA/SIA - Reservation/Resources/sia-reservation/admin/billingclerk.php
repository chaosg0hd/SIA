<?php include('include/header.php'); ?>
<?php include('include/sidebarclerk.php'); ?>
<?php include('model/model_billing.php'); ?>
<title>Reserved Section</title>

<?php
    $data = new Data_room();
    if(isset($_POST['update'])){
        $data->update($_POST,$con);
    }else if(isset($_POST['update_addon'])){
        $data->update_addon($_POST,$con);
        $update_addon = TRUE;
    }else if(isset($_POST['update_payment'])){
        $data->update_payment($_POST,$con);       
    }else if(isset($_POST['update_night'])){
        $data->update_night($_POST,$con); 
        $update_night = TRUE;
    } 
    $billing = $data->get_billing($con);
    $paid = $data->get_paid($con);
?>

<div class="span9">
    <div class="content">
        <div class="module message">
            <div class="module-head">
                <h3>Reserved Section</h3>
            </div>
            <div class="module-body table">    
                <form method="POST" action="billing.php">   
                <?php include('modal/modal_confirm.php'); ?>   
                <?php include('modal/modal_billing.php'); ?>  
                <div class="alert alert-success" style="padding:20px;">
                    <div class="pull-right">                           
                        <a href="print_monthly.php" class="btn btn-default" target="_blank"><i class="menu-icon icon-print"></i> Monthly Report</a>                        
                        <a href="print_yearly.php" class="btn btn-default" target="_blank"><i class="menu-icon icon-print"></i> Annual Report</a>                        
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	text-center display" width="100%">
                    <thead>
                        <tr>
                            <th>Room / Customer</th>
                            <th>Room Rate</th>
                            <th>Other Fees</th>
                            <th>No. of<br>Nights</th>
                            <th>No. of<br>Pax</th>
                            <th>Discount</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $billing->fetch_object()): ?>
                        <tr class="gradeX">
                            <td>
                                <?php $name = $data->get_reservation($row->reservationID,$con); ?>
                                <?php echo $name;?>
                            </td>
                            <td>Php <?php echo $row->roomrate;?></td>
                            <td>
                                <?php $others = $data->get_addon($row->id,$con); ?>
                                <?php while($r = $others->fetch_object()): ?>
                                <font class="<?php echo $r->id;?>" style="color:blue;"><?php echo $r->name;?> (Php <?php echo number_format($r->rate);?>)</font>
                                <a href="#" class="remove" data-billing="<?php echo $row->id;?>" data-id="<?php echo $r->id;?>" style="color:red">[x]</a>
                                <br />
                                <?php endwhile; ?>
                                <br>
                                <a href="#billing_others_modal" data-toggle="modal" class="update2 btn btn-sm btn-warning" data-id="<?php echo $row->id;?>">Add-On</a>
                            </td>
                            <td><?php echo $row->num_night;?></td>
                            <td><?php echo $row->num_pax;?></td>
                            <td>
                                <?php echo $row->discount;?>%<br>
                            </td>
                            <td>Php <font class="total<?php echo $row->id;?>"><?php echo number_format($row->total);?></font></td>
                            <td>
                                <?php $status = $row->status;?>
                                    <button type="button" data-toggle="modal" data-id="<?php echo $row->id;?>" data-target="#payment_modal" class="payment btn btn-primary btn-sm">Pay</button>                                
                                    <button type="button" data-toggle="modal" data-id="<?php echo $row->id;?>" data-target="#billing_modal" class="update btn btn-success btn-sm">Update</button>
                                                               
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        
                        <?php while($row = $paid->fetch_object()): ?>
                        <tr class="gradeX">
                            <td>
                                <?php $name = $data->get_reservation($row->reservationID,$con); ?>
                                <?php echo $name;?>
                            </td>
                            <td>Php <?php echo $row->roomrate;?></td>
                            <td>
                                <?php echo $row->others;?><br>              
                            </td>
                            <td><?php echo $row->num_night;?></td>
                            <td><?php echo $row->num_pax;?></td>
                            <td>
                                <?php echo $row->discount;?>%<br>                                             
                            </td>
                            <td>Php <?php echo number_format($row->total);?></td>
                            <td>
                                <?php echo $row->status;?><br />
                                <small><a href="print.php?id=<?php echo $row->id;?>" target="_blank">[View and Print]</a></small>
                                
                                <?php
                                $q = mysqli_query($con, "select * from tblreservation where dateFrom = '0000-00-00' and dateTo = '0000-00-00' ");
                                $row2 = mysqli_fetch_array($q);
                                if($row2['dateFrom'] != '0000-00-00' && $row2['dateTo'] != '0000-00-00')
                                {
                                echo '<small><button type="button" data-toggle="modal" data-id="'.$row->id.'" data-target="#checkout_modal" class="checkout btn btn-danger btn-sm">Check Out</button></small>';
                                }
                                else
                                {
                                    echo '';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>                    
                </table>
                </div>
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
    <?php if(isset($_POST['cancel_reservation'])) echo '$.jGrowl("Cancelled Successfully!");'; ?>
    <?php if(isset($_POST['confirm_reservation'])) echo '$.jGrowl("Confirmed Successfully!");'; ?>
    <?php if(@$update_night) echo '$.jGrowl("Updated Successfully!");'; ?>
    <?php if(@$update_addon) echo '$.jGrowl("Add-On Updated Successfully!");'; ?>
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
    $('.update').on('click',function(){
        var id = $(this).data('id');
        $.ajax({    
            url: 'update_billing.php', 
            type: 'POST',
            data: { id:id},
            success: function(dataJim) { 
                $('#billing_modal .modal-body').html(dataJim);
            }
         });     
    });
    
    $('.update2').on('click',function(){
        var id = $(this).data('id');
        $.ajax({    
            url: 'update_billing.php', 
            type: 'POST',
            data: { id:id,process:'addon'},
            success: function(dataJim) { 
                $('#billing_others_modal .modal-body').html(dataJim);
            }
         });     
    });
    
    $('.payment').on('click',function(){
        var id = $(this).data('id');
        var process = $(this).data('process');
        $.ajax({    
            url: 'update_billing.php', 
            type: 'POST',
            data: { id:id,process:'payment'},
            success: function(dataJim) { 
                $('#payment_modal .modal-body').html(dataJim);
            }
         });     
    });
    
    $('.checkout').on('click',function(){
        var id = $(this).data('id');
        var process = $(this).data('process');
        $.ajax({    
            url: 'update_billing.php', 
            type: 'POST',
            data: { id:id,process:'checkout'},
            success: function(dataJim) { 
                $('#checkout_modal .modal-body').html(dataJim);
            }
         });     
    });

    $('.checkout1').on('click',function(){
        var id = $(this).data('id');
        var process = $(this).data('process');
        $.ajax({    
            url: 'update_billing.php', 
            type: 'POST',
            data: { id:id,process:'checkout1'},
            success: function(dataJim) { 
                $('#checkout_modal_notpaid .modal-body').html(dataJim);
            }
         });     
    });

    $('.update_night').on('click',function(){
        var id = $(this).data('id');
        var value = $(this).data('value');
        $.ajax({    
            url: 'update_billing.php', 
            type: 'POST',
            data: { id:id,process:'update_night',value:value},
            success: function(dataJim) { 
                $('#update_night_modal .modal-body').html(dataJim);
            }
         });     
    });
    $('.remove').on('click',function(){
        var id = $(this).data('id');
        var billingID = $(this).data('billing');
        var total = '.total'+billingID;
        $('.'+id).fadeOut();
        $(this).fadeOut();
        $.ajax({    
            url: 'update_others.php', 
            type: 'POST',
            data: { id:id},
            success: function(dataJim) { 
                $(total).html(dataJim);
            }
         });  
    });
</script>
</body>
</html>