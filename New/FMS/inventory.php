<?php include('db_connect.php') ?>
    <br>
	<br>
<div class="col-md-8">
	<div class="card">
		<div class="card-body">
		
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th class="text-center">id</th>
						<th class="text-center">inventory_id</th>
						<th class="text-center">name</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					$position = $conn->query("SELECT * FROM users");
					while($row=$position->fetch_assoc()):
					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
									
						<td class="">
                                    
								<p> <b><?php echo $row['doctor_id'] ?></b></p>
                                <td><?php echo $row['name'] ?></td>
						</td>
									
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>