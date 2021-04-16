<?php 
include 'db_connect.php'; 
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM tables where id = ".$_GET['id'])->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>

<div class="container-fluid">
	<form id='table_frm'>
		<div class="form-group">
			<label>Table Name</label>
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id : "" ?>" />
			<input type="text" name="table_name" required="required" class="form-control" value="<?php echo isset($table_name) ? $table_name : "" ?>" />
		</div>
		<div class="form-group">
			<label>Table Capacity</label>
			<input type="text" name ="table_capacity" required="required" class="form-control" value="<?php echo isset($table_capacity) ? $table_capacity : "" ?>" />
		</div>
<div class="form-group">
			<label>Table Status</label>
			<select class="custom-select browser-default select2" name="status_id">
				<option value=""></option>
			<?php
			$stat = $conn->query("SELECT * from table_status order by id asc");
			while($row=$stat->fetch_assoc()):
			?>
				<option value="<?php echo $row['id'] ?>" <?php echo isset($status_id) && $status_id == $row['id'] ? "selected" :"" ?>><?php echo $row['status'] ?></option>
			<?php endwhile; ?>
			</select>
</div>

    </form>
</div>
<script>
	$('[status="status_id"]').change(function(){
		var did = $(this).val()
	})

	$(document).ready(function(){
		$('.select2').select2({
			placeholder:"Please Select Here",
			width:"100%"
		})
		$('#table_frm').submit(function(e){
				e.preventDefault()
				start_load();
			$.ajax({
				url:'ajax.php?action=save_table',
				method:"POST",
				data:$(this).serialize(),
				error:err=>console.log(),
				success:function(resp){
						if(resp == 1){
							alert_toast("Table successfully added","success");
								setTimeout(function(){
								location.reload();

							},1000)
						}else{
							console.log('sad');
						}
				}
			})
		})
	})
</script>