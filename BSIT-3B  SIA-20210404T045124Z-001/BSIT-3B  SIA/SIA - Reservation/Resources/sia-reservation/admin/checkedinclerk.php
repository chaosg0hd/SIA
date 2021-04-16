<?php include('include/header.php'); ?>
<?php include('include/sidebarclerk.php'); ?>
<link rel="stylesheet" type="text/css" href="admin/bootstrap/css/bootstrap.min.css">
<title>Checked In List</title>




<div class="span9">
    <div class="content">
        <div class="col-md-12">

            <form class="form-horizontal" method="post" action="checkedinclerk.php">

                <div class="form-group">
                    <label class="col-md-3">Date: </label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="date">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3"></label>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit" name="search">Search</button>
                    </div>
                </div>

            </form>

                
                    <?php
                    include('conn.php');
                    if(isset($_POST['search']))
                    {

                   
                        $tmp = strtotime($_POST['date']); 
                        $date = date('Y-m-d',$tmp); 
                        
                        $q = mysqli_query($con,
                            "select b.reservationID,
                                    b.roomrate,
                                    b.others,
                                    b.num_night,
                                    b.num_pax,
                                    b.discount,
                                    b.total,
                                    b.status,
                                    c.fname,
                                    c.lname,
                                    r.dateFrom,
                                    r.dateTo,
                                    rm.name
                             from tblbilling b 
                                left join tblreservation r
                                    on r.id = b.reservationID
                                left join tblcustomer c
                                    on c.id = r.customerID
                                left join tblroom rm
                                    on rm.id = r.roomID
                             where r.dateFrom <= '".$date."' 
                                    and r.dateTo >= '".$date."' 
                                    and b.status = 'Confirmed' "
                            );

                        if(mysqli_num_rows($q) > 0)
                        {   
                             echo'
                            <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped text-center display" width="100%"> 
                            <thead>
                                    <tr>
                                    <th>Room / Customer</th>
                                    <th>Room Rate</th>
                                    <th>Other Fees</th>
                                    <th>No. of<br>Nights</th>
                                    <th>No. of<br>Pax</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>';
                            
                            while($row =mysqli_fetch_array($q))
                            {

                            $tmp = strtotime($row['dateFrom']); 
                            $datef = date('M d, Y',$tmp);
                            $tmp1 = strtotime($row['dateTo']); 
                            $datet = date('M d, Y',$tmp1);  

                            echo '
                            <tr>
                                <td>'.$row['name'].'<br>'.$row['fname'].' '.$row['lname'].'<br>'.$datef.' to '.$datet.'</td>
                                <td>'.$row['roomrate'].'</td>
                                <td>'.$row['others'].'</td>
                                <td>'.$row['num_night'].'</td>
                                <td>'.$row['num_pax'].'</td>
                                <td>'.$row['discount'].'</td>
                                <td>'.$row['total'].'</td>
                            </tr>
                            ';
                            }
                        }
                        else
                        {
                            echo '
                            <div class="span9">
                                <div class="alert alert-info">
                                    <h3><center>No details for that date</center></h3>
                                </div>
                            </div>';
                        }
                    }   
                    ?>
            </tbody>
            </table>
        </div>
    </div>
    <!--/.content-->
</div>


    

    <!--/.span9-->

<?php include('include/footer.php'); ?>
<script>
    $('#table').DataTable();
</script>