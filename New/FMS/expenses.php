<?php include('db_connect.php');?>
<br><br>
<div class="container-fluid">
	
	<div class="col-lg-12">
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-4">
			<form action="" id="manage_expenses">
				<div class="card">
					<div class="card-header">
						  Position Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label">Type of Transaction</label>
								<select class="custom-select browser-default select2" name="typeof_transac" id="typeof_transac">
									<option value=""></option>
									<option value="transac1">transac1</option>
									<option value="transac2">transac2</option>
									<option value="transac3">transac3</option>
									<option value="transac4">transac4</option>
								</select>
								<!-- <textarea name="typeof_transac" id="typeof_transac" cols="30" rows="1" class="form-control"></textarea>-->
							</div>
							
							<div class="form-group">
								
								<label class="control-label">Total</label>
								<textarea name="total" id="total" cols="30" rows="1" class="form-control"></textarea>
								<label class="control-label">Send to</label>
								<textarea name="sendto" id="sendto" cols="30" rows="1" class="form-control"></textarea>
								<label class="control-label">Sent from</label>
								<textarea name="sentfrom" id="sentfrom" cols="30" rows="1" class="form-control"></textarea>
							</div>
							
					</div>
							
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-3 offset-md-3">Save</button>
								<button class="btn btn-sm btn-danger col-sm-3" type="button" onclick="_reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">no.</th>
									<th class="text-center">id</th>
									<th class="text-center">Type of Transaction</th>
									<th class="text-center">Total</th>
									<th class="text-center">Send To</th>
									<th class="text-center">Sent From</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$expenses = $conn->query("SELECT * FROM expenses order by id asc");
								while($row=$expenses->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td class="">
										 <p> <b><?php echo $row['id'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['typeof_transac'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['total'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['sendto'] ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo $row['sentfrom'] ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-primary edit_position" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-department_id="<?php echo $row['department_id'] ?>"  >Edit</button>
										<button class="btn btn-sm btn-danger delete_expenses" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
						<button class="btn btn-success btn-sm btn-block col-md-2 float-right" type="button" id="print_btn"><span class="fa fa-print"></span> Print</button>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
</style>
<script>
	function _reset(){
		$('.select2').val('').select2({
			placeholder:"Please Select Here",
			width:"100%"
		
		});
		$('#total').val('');
		$('#sendto').val('');
		$('#sentfrom').val('');
	}
	$('.select2').select2({
		placeholder:"Please Select Here",
		width:"100%"
	})
	$('#manage_expenses').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_expenses',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_expenses').click(function(){
		start_load()
		var cat = $('#manage_expenses')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='name']").val($(this).attr('data-name'))
		$('[name="department_id"]').val($(this).attr('data-department_id')).select2({
			width:"100%"
		})
		end_load()
	})
	$('.delete_expenses').click(function(){
		_conf("Are you sure to delete this position?","delete_expenses",[$(this).attr('data-id')])
	})
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	function delete_expenses($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_expenses',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}

	/* $(document).ready(function(){

$('#print_btn').click(function(){
	var nw = window.open("print_expenses.php?id=<?php echo $_GET['id'] ?>","_blank","height=500,width=800")
	setTimeout(function(){
		nw.print()
		setTimeout(function(){
			nw.close()
			},500)
	},1000)
})
} */
</script>