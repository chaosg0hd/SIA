<?php include('include/header.php'); ?>
<?php include('include/sidebarclerk.php'); ?>
<?php include('model/model_reservation.php'); ?>
<title>Rooms</title>
<?php
    $data = new Data_room();
    if(isset($_POST['cancel_reservation'])){
        $ids = isset($_POST['check']) ? $_POST['check']:null;
        $data->delete_multiple($ids, $con);   
    }else if(isset($_POST['confirm_reservation'])){
        $ids = isset($_POST['check']) ? $_POST['check']:null;
        $data->confirm_reservation($ids, $con);   
    }
    $reservation = $data->get_reservation($con);
?>

<div class="span9">
    <div class="content">
        <div class="module message">
            <div class="module-head">
                <h3>Reservation Management</h3>
            </div>
            <div class="module-option clearfix">                         
                <div class="pull-right">  
                    <button type="button" data-toggle="modal" data-target="#confirm_modal" class="btn btn-success" name="delete_reservation">Confirm Reservation</button>
                    <button type="button" data-toggle="modal" data-target="#cancel_modal" class="btn btn-danger" name="delete_reservation">Cancel Reservation</button>
                    
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
                            <th>Customer</th>
                            <th>Arrival</th>
                            <th>Departure</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $reservation->fetch_object()): ?>
                        <tr class="gradeX">
                            <td><input type="checkbox" class="inbox-checkbox" name="check[]" value="<?php echo $row->id;?>"></td>
                            <td>
                                <?php $room = $data->get_room_byID($row->roomID,$con);?>
                                <a href="#reservation_details_modal" class="show_details" data-id="<?php echo $row->id?>" data-toggle="modal"><?php echo $room;?></a>
                            </td>
                            <td>
                                <?php $customer = $data->get_customer_byID($row->customerID,$con);?>
                                <?php echo $customer;?>
                            </td>
                            <td>
                                <?php $tmp = strtotime($row->dateFrom);?>
                                <?php echo date('M d, Y',$tmp); ?>
                            </td>
                            <td>
                                <?php $tmp = strtotime($row->dateTo);?>
                                <?php echo date('M d, Y',$tmp); ?>
                            </td>
                            <td>
                                <?php $status = $data->get_status($row->id,$con); ?>
                                <font class="<?php if($status=='Pending'){echo 'alert-danger';}else{echo 'alert-success';}?>"><?php echo $status;?></font>
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
    <?php if(isset($_POST['cancel_reservation'])) echo '$.jGrowl("Cancelled Successfully!");'; ?>
    <?php if(isset($_POST['confirm_reservation'])) echo '$.jGrowl("Confirmed Successfully!");'; ?>
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
    $('.show_details').on('click',function(){
        var id = $(this).data('id');
        console.log(id);
        $.ajax({    
            url: 'reservation_details.php', 
            type: 'POST',
            data: { id:id},
            success: function(dataJim) {                                                
                $('#reservation_details_modal .modal-body').html(dataJim);
            }
         }); 
    });
</script>
</body>
</html>