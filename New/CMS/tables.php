<?php include('db_connect.php') ?>
		<div class="container-fluid " >
			<div class="col-lg-12">
				
				<br />
				<br />
				<div class="card">
					<div class="card-header">
						<span><b>Table List</b></span>
						<button class="btn btn-primary btn-sm btn-block col-md-3 float-right" type="button" id="new_tbl_btn"><span class="fa fa-plus"></span> Add Table</button>
					</div>
					<div class="card-body">
						<table id="table" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Table Name</th>
									<th>Table Capacity</th>
									<th>Table Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                    $s_arr[0] = "Unset";
									$stat = $conn->query("SELECT * from table_status");
										while($row=$stat->fetch_assoc()):
											$s_arr[$row['id']] = $row['status'];
										endwhile;
									$table_qry=$conn->query("SELECT * FROM tables") or die(mysqli_error());
									while($row=$table_qry->fetch_array()){
								?>
								<tr>
									<td><?php echo $row['table_name']?></td>
									<td><?php echo $row['table_capacity']?></td>
									<td><?php echo $s_arr[$row['status_id']]?></td>
									<td>
										<center>
										 <button class="btn btn-sm btn-outline-primary edit_table" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-edit"></i></button>
										<button class="btn btn-sm btn-outline-danger remove_table" data-id="<?php echo $row['id']?>" type="button"><i class="fa fa-trash"></i></button>
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

			

			
			$('.edit_table').click(function(){
				var $id=$(this).attr('data-id');
				uni_modal("Edit table","manage_table.php?id="+$id)
				
			});
			$('#new_tbl_btn').click(function(){
				uni_modal("New Table","manage_table.php")
			})
			$('.remove_table').click(function(){
				_conf("Are you sure to delete this table?","remove_table",[$(this).attr('data-id')])
			})
		});
		function remove_table(id){
			start_load()
			$.ajax({
				url:'ajax.php?action=delete_table',
				method:"POST",
				data:{id:id},
				error:err=>console.log(err),
				success:function(resp){
						if(resp == 1){
							alert_toast("Table data successfully deleted","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}
					}
			})
		}
	</script>
