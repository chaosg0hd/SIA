<?php include('include/header.php'); ?>
<?php include('include/page-header.php'); ?>
<?php
    $q = "select * from tblprofile order by id desc";
    $row = $con->query($q)->fetch_object();
?>
<title>iHOTEL: About</title>

<section>
	<div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h3>COMPANY PROFILE</h3>
                <hr />
                <p class="align-justify">
                    <?php echo $row->profile; ?>
                </p>
                <br />
                <h3>Out Policies</h3>
                <hr />
                <p class="align-justify">
                    <?php echo $row->policy; ?>
                </p>
            </div>
            <div class="col-sm-4">
                <h3>Services Offered</h3>
                
                <div class="list">
                <?php echo $row->service; ?>
                </div>
            </div>
        </div>        
        
	</div>
</section>
<form method="POST">
<?php include('modal/modal_room.php'); ?>
</form>

<?php include('include/footer.php'); ?>
<?php include('include/daterange.php'); ?>
<?php include('include/daterange.php'); ?>
	<script src="assets/js/custom.js"></script>

<script>
    $('.list ol').addClass('list-group');
    $('.list ol li').addClass('list-group-item');
</script>
</body>
</html>

