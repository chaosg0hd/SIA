
<style>
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
				<br>
				<br>
				<br>
				<br>
				<br>				
				<a href="index.php?page=product_list" class="nav-item nav-product_list"><span class='icon-field'><i class="fas fa-hamburger"></i></span> Product List</a>
				<a href="index.php?page=unavailable_list" class="nav-item nav-unavailable_list"><span class='icon-field'><i class="fas fa-hamburger"></i></span> Unvailable List</a>		
				<a href="index.php?page=product_preparation" class="nav-item nav-product_preparation"><span class='icon-field'><i class="fas clipboard-list"></i></span> Product Preparation</a>
				<a href="index.php?page=bundles" class="nav-item nav-bundles"><span class='icon-field'><i class="fas fa-receipt"></i></span> Bundles</a>
				<?php //if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>				
				<?php //endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
