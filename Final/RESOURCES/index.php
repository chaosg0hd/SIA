<?php
    session_start();
    if(!isset($_SESSION['Access_'])){
        header('location:login.php');
    }
?>	
<!DOCTYPE html>
<html>

  

<?php 

include './conn.php'; 
include './header.php';
// To Refresh : might be useful idk

//header('Refresh: 60'); ?>

<style>

body{
    height: 100%;
    width: 100%;
}

</style>

<!-- Script to show sys request -->

<?php $sys = isset($_GET['sys']) ? $_GET['sys'] :'home'; ?>
<script> console.log("<?php echo  $sys ;?>") </script>

<!-- Script to show page request -->

<?php $page = isset($_GET['page']) ? $_GET['page'] :'home'; ?>
<script> console.log("<?php echo  $page ;?>") </script>

<!-- Script show to url request -->

<script> console.log("<?php echo  './'.$sys.'/'.$page.'.php' ;?>") </script>

<body>

<!-- Loads Topbar -->

<?php include 'topbar.php' ?>

<!-- Loads Sidebar -->

<?php include 'sidebar.php' ?>

<!-- Pag ok na lahat pede na mag toast -->

<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
</div>

<!-- Loads Main Viewpanel -->

<?php include 'viewpanel.php' ?> 

</body>


<script>
</script>

<!-- Script to set active topbar button -->

<script>
	$('#btn-topbar-<?php echo isset($_GET['sys']) ? $_GET['sys'] : '' ?>').toggleClass('btn-topbar-active');
</script>

<!-- Script to set active sidebar button -->

<script>
	$('#sidebar-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').toggleClass('nav-item-active');
</script>


<!-- Script to show session data -->

<script> console.log("<?php echo $_SESSION['Access_']; echo "    ";echo  $_SESSION['Image_']; ?>") </script>

 </html>