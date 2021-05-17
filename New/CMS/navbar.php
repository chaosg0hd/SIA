<style>
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark'>		
	<div class="sidebar-list">
		<br>
		<br>
		<br>
		<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
		<a href="index.php?page=tables" class="nav-item nav-employee"><span class='icon-field'><i class="fas fa-table"></i></span> Table List</a>
		<a href="index.php?page=reservations" class="nav-item nav-reservations"><span class='icon-field'><i class="fas fa-clipboard-list"></i></span> Reservations</a>
		<a href="index.php?page=orders" class="nav-item nav-oderse"><span class='icon-field'><i class="fa fa-fish"></i></span> Orders</a>	
	</div>
</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
