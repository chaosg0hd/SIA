<?php include 'db_connect.php' ?>

<?php
$res = $conn->query("SELECT r.*,rs.status as rstatus, c.firstname as cfname, c.lastname as clname FROM reservations r inner join reservation_status rs on r.status_id = rs.id INNER JOIN customers c on r.customer_id = c.id where r.id =".$_GET['id'])->fetch_array();
	foreach($res as $k=>$v){
		$$k=$v;
	}
?>

<div class="contriner-fluid">
	<div class="col-md-12">
		<h5><b><small>Reservation No. :</small><?php echo $reservation_no ?></b></h5>
		<h4><b><small>Customer Name: </small><?php echo ucwords($cfname." ".$clname) ?></b></h4>
		<p>Phone Number : <?php echo $phone_no ?></p>
		<p>Reservation Date : <?php echo $reservation_date ?></p>
		<p>Reservation Time : <?php echo $reservation_time ?></p>
		<p>Reservation Status : <?php echo ucwords($rstatus) ?></p>
		<p>Reserved Tables :
		<?php

		$reservation_number = $_GET['id'];
		$sql3 = "SELECT rt.reservation_id, rt.table_id, t.table_name
			FROM reservation_tables as rt, tables as t 
			WHERE t.id = rt.table_id
			and rt.reservation_id ='$reservation_number';";
		$result3 = $conn->query($sql3);
		foreach ($result3 as $r3) {
		?>
		<?php echo $r3['table_name']; ?>, 
		<?php  }?>
		</p>

	</div>

</div>
<style type="text/css">

</style>
<script>

</script>