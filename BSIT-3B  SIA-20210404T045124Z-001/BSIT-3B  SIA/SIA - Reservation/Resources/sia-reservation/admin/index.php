<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php
    $reservation = $con->query("select * FROM tblbilling WHERE tblbilling.status='Pending'");
    $reservation = $reservation->num_rows;
    $customer = @$con->query("select * FROM tblcustomer where tblcustomer.status=0");
    $customer =  $customer->num_rows;
    $dateNow = date('m-Y');
    $profit = $con->query("SELECT SUM(tblbilling.total)
        FROM tblreservation
        left join tblbilling on tblreservation.id = tblbilling.reservationID
        WHERE DATE_FORMAT(tblreservation.dateTo,'%m-%Y') = '$dateNow' and tblbilling.status='Paid'")->fetch_array();
    $profit = $profit[0];
;
    $billing = $con->query("select * from tblbilling where status='Paid'");
?>
<title>Admin Panel</title>
<div class="span9">
    <div class="content">
        <div class="btn-controls">
            <div class="btn-box-row row-fluid">
                <a href="#" class="btn-box big span4"><i class=" icon-book"></i><b><?php echo $reservation; ?></b>
                    <p class="text-muted">
                        Reservation</p>
                </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b><?php echo $customer; ?></b>
                    <p class="text-muted">
                        New Customer</p>
                </a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b>Php <?php echo number_format($profit,2); ?></b>
                    <p class="text-muted">
                        <?php echo date('F'); ?> Profit</p>
                </a>
            </div>            
        </div>
        <!--/#btn-controls-->
        
        
<?php include('include/footer.php'); ?>
<script>
    $('#table').DataTable();
</script>