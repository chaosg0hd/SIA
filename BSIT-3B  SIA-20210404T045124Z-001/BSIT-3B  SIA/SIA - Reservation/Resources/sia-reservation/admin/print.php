<?php
    include('../conn.php');
    $id = $_GET['id'];
    $q = "SELECT 
tblroom.name, 
tblcustomer.fname,tblcustomer.mname, tblcustomer.lname, tblcustomer.contact, tblcustomer.address,
tblbilling.roomrate, tblbilling.num_night, tblbilling.num_pax, tblbilling.others, tblbilling.discount, tblbilling.total,
tblreservation.dateFrom,tblreservation.dateTo
FROM tblreservation
LEFT JOIN tblcustomer on tblreservation.customerID=tblcustomer.id
LEFT JOIN tblroom on tblreservation.roomID=tblroom.id
LEFT JOIN tblbilling on tblreservation.id=tblbilling.reservationID
WHERE tblreservation.id=$id";
    $row = $con->query($q)->fetch_object();
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

    <title>Print Receipt</title>
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
<body>
    <div class="container wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <img src="images/logo.png" width="100px" height="100px" />
                    <h3>iHOTEL
                        <br><small class="text-muted"><?php echo $address;?></small>
                        <br><small class="text-muted">Contact No: <?php echo $contact;?></small>
                    </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <section class="content invoice">
                <div class="table-responsive">
                    <table>
                        <tr>
                            <td class="col-sm-2"><strong>CUSTOMER'S NAME:</strong></td>
                            <td><?php echo $row->fname.' '.$row->mname[0].'. '.$row->lname;?></td>
                        </tr>
                        <tr>
                            <td class="col-sm-2"><strong>ADDRESS:</strong></td>
                            <td><?php echo $row->address; ?></td>
                        </tr>
                        <tr>
                            <td class="col-sm-2"><strong>NO. OF NIGHT(S):</strong></td>
                            <td><?php echo $row->num_night; ?></td>
                        </tr>
                         <tr>
                            <td class="col-sm-2"><strong>NO. OF PERSON(S):</strong></td>
                            <td><?php echo $row->num_pax; ?></td>
                        </tr>
                        <tr>
                            <td class="col-sm-2"><strong>DATE ISSUED:</strong></td>
                            <?php $date = date('M d, Y');?>
                            <td><?php echo $date;?></td>
                        </tr>
                    </table>
                </div>
                <br />
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Room</th>
                                <th>Room Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            <?php $dateF = null; ?>
                            <?php $date = $row->dateFrom;?>
                            <?php $tmp = strtotime($date); ?>
                            <?php $dateF = date('M d, Y',$tmp); ?>

                            <?php $dateT = null; ?>
                            <?php $date1 = $row->dateTo;?>
                            <?php $tmp1 = strtotime($date1); ?>
                            <?php $dateT = date('M d, Y',$tmp1); ?>

                            <?php for($c=0;$c < $row->num_night;$c++):?>
                            <tr>
                                <td>
                                    <strong><?php echo $row->name; ?></strong>
                                    (<?php echo $dateF.' to '.$dateT; ?>)
                                    
                                    <?php $dateF = date('M d, Y',strtotime($dateF . "+1 days"));?>
                                </td>
                                <td>Php <?php echo $row->roomrate;?></td>
                                <?php $total = $total + $row->roomrate; ?>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table width="100%">
                        <tr>
                            <td class="text-right"><strong>TOTAL ROOM CHARGES</strong></td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>Php <?php echo $total; ?></td>
                        </tr> 
                        <tr>
                            <td class="text-right"><strong>TAXES</strong></td>
                            <td>&nbsp;:&nbsp;</td>
                            <?php $tax = $row->total * 0.12; ?>
                            <td>Php <?php echo $tax; ?></td>
                        </tr>
                        <tr>
                            <td class="text-right"><strong>OTHER FEES</strong></td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>Php <?php echo $row->others; ?></td>
                        </tr> 
                        <tr>
                            <td class="text-right"><strong>DISCOUNT</strong></td>
                            <td>&nbsp;:&nbsp;</td>
                            <td><?php echo $row->discount; ?>%</td>
                        </tr> 
                        <tr>
                            <td class="text-right"><strong>TOTAL</strong></td>
                            <td>&nbsp;:&nbsp;</td>
                            <td>Php <?php echo $row->total; ?></td>
                        </tr> 
                    </table>
                </div>
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