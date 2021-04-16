<?php
    include('../conn.php');
    $dateNow = date('m-Y');
    $q = "SELECT *
        FROM tblreservation
        left join tblbilling on tblreservation.id = tblbilling.reservationID
        WHERE DATE_FORMAT(tblreservation.dateTo,'%m-%Y') = '$dateNow' and tblbilling.status='Paid'";
    $billing = $con->query($q);
    $address = $con->query("select * from tblprofile order by id desc")->fetch_object()->address;
    $contact = $con->query("select * from tblprofile order by id desc")->fetch_object()->contact;
?>
<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Montly Report</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/print.css" rel="stylesheet">
    <style>
        .wrapper {
            margin-top:20px !important;            
            border:1px solid #777;
            background:#fff;
            
            padding: 20px;
        }
        body {
            background:#ccc;   
        }
        /* 
    Page: Invoice
*/
.invoice {
  position: relative;
  width: 90%;
  margin: 10px auto;
  background: #fff;
  border: 1px solid #f4f4f4;
    padding:10px;
}
.invoice-title {
  margin-top: 0;
}
/* Enhancement for printing */
@media print {
  .invoice {
    width: 100%;
    border: 0;
    margin: 0;
    padding: 0;
  }
  .invoice-col table td,.invoice-col table th, {
    padding:0px;
  }
  .table-responsive {
    overflow: auto;
  }
  .table-responsive > .table tr th,
  .table-responsive > .table tr td {
    white-space: normal!important;
  }
}
@media print {
  .no-print {
    display: none;
  }
  .left-side,
  .header,
  .content-header {
    display: none;
  }
  .right-side {
    margin: 0;
  }
}
        
    </style>
</head>
<?php
    function get_name($id,$con){
        $q = "select * from tblreservation
left join tblroom on tblreservation.roomID=tblroom.id
left join tblcustomer on tblreservation.customerID=tblcustomer.id
where tblreservation.id=$id";
        return $con->query($q)->fetch_object();
    }
?>
<body>
    <div class="container wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <img src="images/logo.png" width="100px" height="100px" />
                    <h3>iHOTEL
                        <br><small class="text-muted">Montly Report</small>
                        <br><small class="text-muted"><?php echo $address;?></small>
                        <br><small class="text-muted">Contact No: <?php echo $contact;?></small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <section class="content invoice">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Room / Customer</th>
                                <th>Rate</th>
                                <th>Other Fees</th>
                                <th>No. Nights</th>
                                <th>No. Pax</th>
                                <th>Discount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            <?php while($row = $billing->fetch_object()): ?>
                            <tr>
                                <td>
                                    <?php echo date('m/d/y',strtotime($row->dateFrom)); ?> - 
                                    <?php echo date('m/d/y',strtotime($row->dateTo)); ?>
                                </td>
                                <td>
                                    <?php $name =get_name($row->id,$con);?>
                                    <?php echo $name->name; ?><br />
                                    <small>(<?php echo $name->fname.' '.$name->lname;?>)</small>
                                </td>                                
                                <td>Php <?php echo number_format($row->roomrate); ?></td>
                                <td>Php <?php echo number_format($row->others); ?></td>
                                <td><?php echo $row->num_night; ?></td>
                                <td><?php echo $row->num_pax; ?></td>
                                <td><?php echo $row->discount; ?></td>
                                <td>Php <?php echo number_format($row->total); ?></td>
                            </tr>
                            <?php $total = $total + $row->total; ?>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <strong>TOTAL: Php <?php echo number_format($total); ?></strong>
                <div class="clearfix"></div>
                <div class="row no-print">
                    <div class="col-xs-12">                        
                        <button class="btn btn-success pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        <span class="pull-right">&nbsp;</span>
                        <button class="btn btn-default pull-right" onclick="window.close();"><i class="fa fa-share"></i> Close</button>
                    </div>
                </div>
                </section>
        </div>
    </div>
</body>
</html>