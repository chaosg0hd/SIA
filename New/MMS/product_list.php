<?php include('db_connect.php');?>
<div class="container-fluid">
<br>
<br>	
	<div class="col-lg-12">			
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th class="text-center">Product ID</th>
							<th class="text-center">Name</th>
							<th class="text-center">Category</th>
							<th class="text-center">Description</th>
							<th class="text-center">Contents</th>
							<th class="text-center">Price</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$prod = $conn->query("SELECT * FROM product_list WHERE product_status = 'Available'");
						while($row=$prod->fetch_assoc()):
						?>
						<tr>									
							<td class="">
									<p><b><?php echo $row['product_id'] ?></b></p>									
							</td>
							<td class="">
									<p><b><?php echo $row['product_name'] ?></b></p>									
							</td>
							<td class="">
									<p><b><?php echo $row['product_category'] ?></b></p>									
							</td>
							<td class="">
									<p><b><?php echo $row['product_description'] ?></b></p>									
							</td>
							<td class="">
									<p><b><?php echo $row['product_contents'] ?></b></p>									
							</td>
							<td class="">
									<p><b><?php echo $row['product_price'] ?></b></p>									
							</td>
							<td class="text-center">
								<button class="btn btn-sm btn-primary edit_allowances" type="button" data-id="<?php echo $row['product_id'] ?>" data-allowance="<?php echo $row['allowance'] ?>" data-description="<?php echo $row['description'] ?>" >Edit</button>
								<button class="btn btn-sm btn-danger delete_allowances" type="button" data-id="<?php echo $row['product_id'] ?>">Delete</button>
							</td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>		
	</div>	
</div>