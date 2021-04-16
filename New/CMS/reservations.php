<?php include('db_connect.php') ?>
		<div class="container-fluid " >
			<div class="col-lg-12">
				
				<br />
				<br />
				<div class="card">
					<div class="card-header">
						<span><b>Reservation List</b></span>
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Reservation Number</th>
									<th>Customer First Name</th>
									<th>Customer Last Name</th>
									<th>Phone Number</th>
									<th>Date</th>
									<th>Time</th>
                                    <th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$cfname_arr[0] = "Unset";
									$clname_arr[0] = "Unset";
									$s_arr[0] = "Unset";
									$res = $conn->query("SELECT * from customers order by id asc");
										while($row=$res->fetch_assoc()):
											$cfname_arr[$row['id']] = $row['firstname'];
											$clname_arr[$row['id']] = $row['lastname'];
										endwhile;
										$rstat = $conn->query("SELECT * from reservation_status order by id asc");
										while($row=$rstat->fetch_assoc()):
											$s_arr[$row['id']] = $row['status'];
										endwhile;
									$reservation_qry=$conn->query("SELECT * FROM reservations") or die(mysqli_error());
									while($row=$reservation_qry->fetch_array()){
								?>
								<tr>
									<td><?php echo $row['reservation_no']?></td>
									<td><?php echo $cfname_arr[$row['customer_id']]?></td>
									<td><?php echo $clname_arr[$row['customer_id']]?></td>
									<td><?php echo $row['phone_no']?></td>
									<td><?php echo $row['reservation_date']?></td>
									<td><?php echo $row['reservation_time']?></td>
									<td><?php echo $s_arr[$row['status_id']]?></td>
									<td>
										<center>
										 <button class="btn btn-sm btn-outline-primary view_reservation" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-eye"></i></button>
										 <button id="accept_reservation" class="btn btn-sm btn-primary accept_reservation" type="button" data-id="<?php echo $row['id'] ?>">Accept</button>
	    								 <button id="reject_reservation" class="btn btn-sm btn-danger reject_reservation" type="button" data-id="<?php echo $row['id'] ?>">Reject</button>
										</center>
									</td>
								</tr>
								<?php
									}
								?>
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
			
			$('.view_reservation').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Reservation Details","view_reservation.php?id="+$id,"mid-large")
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
