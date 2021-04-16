<?php include('db_connect.php') ?>
    <br>
	<br>

<style>

table{
	font-size:11px;
}

</style>


<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<table id="table" class="table-sm table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">Item ID</th>
									<th class="text-center">Name</th>
									<th class="text-center">Description</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Date Acquired</th>
									<th class="text-center">Date Expired</th>
									<th class="text-center">Unit Price</th>
									<th class="text-center">Minimum Amount</th>
									<th class="text-center">Remarks</th>
									<th class="text-center">Last Modified</th>
									<th class="text-center">Modified by</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$inventory = $conn->query("SELECT * FROM inventory_tbl WHERE item_quantity <= item_minimum");
								while($row=$inventory->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $row['item_id'] ?></td>

									<td class="text-center">
										 <p><?php echo $row['item_name'] ?></b></p>
									</td>
									
									<td class="text-center">
										 <p><?php echo $row['item_description'] ?></b></p>
									</td>
									
									<td class="text-center">
										 <p><?php echo $row['item_quantity'] ?></b></p>
									</td>

									<td class="text-center">
										 <p><?php echo $row['item_acq'] ?></b></p>
									</td>

									<td class="text-center">
										 <p><?php echo $row['item_exp'] ?></b></p>
									</td>

									<td class="text-center">
										 <p><?php echo $row['item_unit_price'] ?></b></p>
									</td>

									<td class="text-center">
										 <p><?php echo $row['item_minimum'] ?></b></p>
									</td>

									<td class="text-center">
										 <p><?php echo $row['remarks'] ?></b></p>
									</td>

									<td class="text-center">
										 <p><?php echo $row['last_mod_date'] ?></b></p>
									</td>

									<td class="text-center">
										 <p><?php echo $row['last_mod_user'] ?></b></p>
									</td>

									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_allowances" type="button" data-id="<?php echo $row['id'] ?>" data-allowance="<?php echo $row['allowance'] ?>" data-description="<?php echo $row['description'] ?>" >Edit</button>
										<button class="btn btn-sm btn-danger delete_allowances" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>						
					</div>
				</div>
			</div>