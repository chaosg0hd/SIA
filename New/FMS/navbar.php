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
				<a href="index.php?page=payroll" class="nav-item nav-payroll"><span class='icon-field'><i class="fa fa-columns"></i></span> Payroll List</a>
				<a href="index.php?page=inventory" class="nav-item nav-inventory"><span class='icon-field'><i class="fa fa-user-tie"></i></span> Inventory</a>
				<a href="index.php?page=pos" class="nav-item nav-pos"><span class='icon-field'><i class="fa fa-money-bill-wave"></i></span> Point of Sales</a>		
				<a href="index.php?page=expenses" class="nav-item nav-expenses"><span class='icon-field'><i class="fa fa-money-bill-wave"></i></span> Expenses</a>
				<a href="index.php?page=finance" class="nav-item nav-finance"><span class='icon-field'><i class="fa fa-money-bill-wave"></i></span> Finance</a>			
				<?php //if($_SESSION['login_type'] == 1): ?>		
				<?php //endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
