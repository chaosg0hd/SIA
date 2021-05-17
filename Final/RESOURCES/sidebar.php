<style>
#nav-sidebar{
    width: 12%;
    height: 88vh;   
	border-radius: 0px 50px 0px 0px;
    background: var(--color_primary);
    background-image: linear-gradient(to bottom, rgba(173, 110, 81, .3), rgb(173, 156, 81, .9));
    padding: 0px !important;
}
#nav-sidebar-list{
    width: 100%;    	
	border-style: none;
	border-radius: 0px 50px 0px 0px;
	padding-top: 50px !important;
	display: flex;
	flex-direction: column;
}
.nav-item{
	border-style: none;
    border-width: 1px;
	padding: 8px !important;	
    padding-left: 30px !important;
	font-size: 18px;
	
}
.nav-item:hover,.nav-item:active{
	width: 100%;
	color: var(--black) !important;
    background-image: linear-gradient(to right, rgba(255, 255, 255, .4), rgb(255, 255, 255, .9));
	padding: 8px !important;
	font-size: 20px;
}
.nav-item-active, .nav-item-active:active, .nav-item-active:hover{
	width: 125%;	
	color: var(--white) !important;
	clip-path: polygon(90% 0, 100% 50%, 90% 100%, 0% 100%, 0% 0%);
    background-image: linear-gradient(to right, rgba(0, 0, 0, .4), rgb(0, 0, 0, 1));
	padding: 8px !important;
	font-size: 26px;
}
</style>
<nav id="nav-sidebar">		
	<div id="nav-sidebar-list">				
		<?php include './'.$sys.'/directory.php' ?>
	</div>
</nav>

<script>
	$('#sidebar-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
