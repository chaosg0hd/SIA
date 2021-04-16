<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Navigation Page</title> 	

	<?php include('./header.php'); ?>
	<?php include('./db_connect.php'); ?>
	<?php 
	session_start();
	if(isset($_SESSION['login_id']))

	?>

</head>

<style>
	.button {
	background-color: #4CAF50; /* Green */
	border: none;
	color: white;
	padding: 10px 10px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 8px;
	margin: 4px 2px;
	transition-duration: 0.4s;
	cursor: pointer;
	}

	.buttonnav {
	background-color: white; 
	color: black; 
	border: 2px solid #4CAF50;
	}

	.buttonnav:hover {
	background-color: #4CAF50;
	color: white;
	}
</style>

<body>	
	<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;min-height:5rem;font-size: 15px;">
		<div class="container-fluid mt-2 mb-2">
			<div class="col-lg-12">
				<div class="col-md-4 float-left text-white">
				<img src="cocolimelogo.png" width="150" height="50">
				<large><b>Coco Lime Management System</b></large>
				</div>
				<div class="col-md-2 float-right text-white">
	  				<a href="ajax.php?action=logout" class="text-white"><?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a>
				</div>
			</div>
		</div>
	</nav>

	<div>
		<ul class="list-group">
			<a class="btn btn-primary" href="index.php" role="button"><li class="list-group-item"><button class="button buttonnav">Button ako</button></li></a>
			<li class="list-group-item"><button class="button buttonnav">Button ako</button></li>
			<li class="list-group-item"><button class="button buttonnav">Button ako</button></li>
			<li class="list-group-item"><button class="button buttonnav">Button ako</button></li>
			<li class="list-group-item"><button class="button buttonnav">Button ako</button></li>
			<li class="list-group-item"><button class="button buttonnav">Button ako</button></li>
			<li class="list-group-item"><button class="button buttonnav">Button ako</button></li>
		</ul>
	</div>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>
<script>
	
</script>	
</html>