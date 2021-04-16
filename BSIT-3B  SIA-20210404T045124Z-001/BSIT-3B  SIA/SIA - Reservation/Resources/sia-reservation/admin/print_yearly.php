<?php
    include('../conn.php');   
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

    <title>Annual Report</title>
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
    function calculate($date,$con){
       $q = "SELECT *
            FROM tblreservation
            left join tblbilling on tblreservation.id = tblbilling.reservationID
            WHERE DATE_FORMAT(tblreservation.dateTo,'%m-%Y') = '$date' and tblbilling.status='Paid'";
        $billing = $con->query($q);
        $total = 0;
        while($row = $billing->fetch_object()):
            $total = $total + $row->total;
        endwhile;
        return $total;
    }
?>
<body>
    <div class="container wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <img src="images/logo.png" width="100px" height="100px" />
                    <h3>iHOTEL
                        <br><small class="text-muted">Annual Report</small>
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
                                <th>Year</th>
                                <th>Month</th>
                                <th>Income</th>
                            </tr>
                        </thead>  
                        <tbody>
                            <?php $grand = 0; ?>
                            <?php for($c=1;$c<=12;$c++):?>
                                <tr>
                                    <td><?php echo $year = date('Y');?></td>
                                    <td><?php echo date('F',strtotime('2015-'.$c.'-10'));?></td>
                                    <?php $date=date('m-Y',strtotime($year.'-'.$c));?>
                                    <?php $total = calculate($date,$con);?>
                                    <td>Php <?php echo number_format($total,2);?></td>
                                    <?php $grand = $grand + $total; ?>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
                <strong>TOTAL: Php <?php echo number_format($grand,2);?></strong>
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