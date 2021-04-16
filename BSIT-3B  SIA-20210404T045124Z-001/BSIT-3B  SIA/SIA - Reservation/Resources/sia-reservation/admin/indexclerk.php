<?php include('include/header.php'); ?>
<?php include('include/sidebarclerk.php'); ?>
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
        
        <div class="module">
            <div class="module-head">
                <h3>Billing Report</h3>
            </div>
            <div class="module-body table">
                <table id="table" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display"
                    width="100%">
                    <thead>
                        <tr>
                            <th>
                                Room
                            </th>
                            <th>
                                Customer
                            </th>
                            <th>
                                No. Night
                            </th>
                            <th>
                                No. Pax
                            </th>
                            <th>
                                Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row = $billing->fetch_object()): ?>
                        <tr>
                            <?php 
                                $reservationID = $row->reservationID;
                                $q = "select * from tblreservation 
                                        left join tblcustomer on tblreservation.customerID=tblcustomer.id
                                        left join tblroom on tblreservation.roomID=tblroom.id
                                        where tblreservation.id=$reservationID order by tblreservation.id desc";
                                $name = $con->query($q)->fetch_object();
                            ?>
                            <td><?php echo $name->name; ?></td>
                            <td><?php echo $name->fname.' '.$name->lname; ?></td>
                            <td><?php echo $row->num_night; ?></td>
                            <td><?php echo $row->num_pax; ?></td>
                            <td>Php <?php echo number_format($row->total,2); ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>                    
                </table>
            </div>
        </div>
        <!--/.module-->
    </div>
    <!--/.content-->
    </div>
    <!--/.span9-->

<?php include('include/footer.php'); ?>
<script>
    $('#table').DataTable();
</script>