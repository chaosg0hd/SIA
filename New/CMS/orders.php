<?php include('db_connect.php') ?>
		<div class="container-fluid " >
			<div class="col-lg-12">
				
				<br />
				<br />
				<div class="card">
					<div class="card-header">
						<span><b>Order List</b></span>
                        <button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="new_tbl_btn"><span class="fa fa-plus"></span>New Order</button>
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Table Number</th>
									<th>Date</th>
									<th>Time</th>
                                    <th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							
								<tr>
									<td>1</td>
									<td>2021-4-16</td>
									<td>9:00 AM</td>
									<td>Pending</td>
									<td>
										<center>
										 <button class="btn btn-sm btn-outline-primary view_orders" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-eye"></i></button>
										 <button id="accept_reservation" class="btn btn-sm btn-primary accept_reservation" type="button" data-id="<?php echo $row['id'] ?>">Accept</button>
	    								 <button id="reject_reservation" class="btn btn-sm btn-danger reject_reservation" type="button" data-id="<?php echo $row['id'] ?>">Reject</button>
										</center>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
			
		
		
	<script type="text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			$('.view_orders').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Order Details","view_orders.php?id="+$id,"mid-large")
			});

			$('.accept_reservation').click(function(){
            _conf("Are you sure to accept this reservation?","accept_reservation",[$(this).attr('data-id')])
        	})

        	$('.reject_reservation').click(function(){
            _conf("Are you sure to reject this reservation?","reject_reservation",[$(this).attr('data-id')])
        	})

		});

		function accept_reservation(id){
			start_load()
			$.ajax({
				url:'ajax.php?action=accept_reservation',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Reservation accepted","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}else{
							console.log("betlog");
						}
					}
			})
		}

		function reject_reservation(id){
			start_load()
			$.ajax({
				url:'ajax.php?action=reject_reservation',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Reservation rejected","warning");
								setTimeout(function(){
								location.reload();

							},1000)
						}else{
							console.log("betlogkatanginamo");
						}
					}
			})
		}
	</script>
