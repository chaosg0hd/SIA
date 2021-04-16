
<style>
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<br>
				<br>
				<br>
				<br>
				<br>
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=inventory" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-user-tie"></i></span> Inventory</a>				
				<a href="index.php?page=item_movement" class="nav-item nav-item_movement"><span class='icon-field'><i class="fa fa-user-tie"></i></span> Item Changes</a>
				<a href="index.php?page=item_threshold" class="nav-item nav-item_threshold"><span class='icon-field'><i class="fa fa-user-tie"></i></span> Low Stock</a>

				<?php //if($_SESSION['login_type'] == 1): ?>		
				<?php //endif; ?>
		</div>
</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
