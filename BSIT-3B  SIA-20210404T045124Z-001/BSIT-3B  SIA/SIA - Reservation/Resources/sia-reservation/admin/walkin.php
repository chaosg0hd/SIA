<?php include('include/header.php'); ob_start();?>
<?php include('include/sidebar.php');?>

<title>Checked In List</title>

<style type="text/css">
.left {
    margin-left:50px;
}

.ui-datepicker-month {
        color:#000;   
    }
</style>


<div class="span9">
   
        <div class="module message">
            <div class="module-head">
                <h3>Walk in Customer</h3>
            </div>
            <div class="left col-md-offset-3">
            <form class="form-horizontal" method="post" action="walkin.php" style="margin-top: 20px; margin-bottom: 20px;">

                <div class="input-group">
                    <label class="input-group-addon" id="basic-addon1"><b>Date From: </b></label>
                    
                        <input type="text" id="from" name="datefrom" class="form-control" placeholder="mm/dd/yyyy">
                   
                </div>

                <div class="input-group">
                    <label class="input-group-addon" id="basic-addon1"><b>Date To: </b></label>
                    
                        <input type="text" id="to" name="dateto" class="form-control" placeholder="mm/dd/yyyy">
               
                </div>

                <div class="control-group">
                    <label class="col-md-3"></label>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit" name="check">Check</button>
                    </div>
                </div>


            <?php
            include 'conn.php';
            if(isset($_POST['check']))
            {
                $dateF = $_POST['datefrom'];
                $dateT = $_POST['dateto'];
               
                $tmp1 = strtotime($dateF);

                $dateFrom = date('Y-m-d',$tmp1);

                $_SESSION['datef'] = $dateFrom;

                $tmp2 = strtotime($dateT);

                $dateTo = date('Y-m-d',$tmp2);

                $_SESSION['datet'] = $dateTo;
                $q = mysqli_query($con, "select dateFrom, dateTo from tblreservation 
                                        where dateFrom = '$dateFrom'
                                        and dateTo = '$dateTo' ");
                if(mysqli_num_rows($q) > 0 )
                {
                    echo'<div class="alert alert-info">
                        The Date from '.date('M d, Y',$tmp1).' to '.date('M d, Y',$tmp2).' is reserved. </h4>    
                    </div>';
                }
                else
                {
              
                    echo '
                
                <div class="control-group">
                    <label class="col-md-3"><b>Firstname: </b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="fname" placeholder="Firstname">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Middlename: </b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="mname" placeholder="Middlename">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Lastname: </b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="lname" placeholder="Lastname">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Address: </b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Contact: </b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="contact" placeholder="Contact">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Email: </b></label>
                    <div class="col-md-4">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Company: </b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="company" placeholder="Company">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Designation: </b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="designation" placeholder="Designation">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Date of Birth: </b></label>
                    <div class="col-md-4">
                        <input type="date" class="form-control" name="dob">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Username: </b></label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="uname" placeholder="Username">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Password: </b></label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Room: </b></label>
                    <div class="col-md-4">
                        <select class="form-control" name="room">';
                             
                                $q = mysqli_query($con,"select name from tblroom");
                                while($row=mysqli_fetch_array($q))
                                {
                                    echo '
                                        <option>'.$row['name'].'</option>
                                    ';
                                }
                           
                    echo'</select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="col-md-3"><b>Number of Person(s): </b></label>
                    <div class="col-md-4">
                        <select class="form-control" name="num_pax">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="date1" value="'.$_SESSION['datef'].'">
                <input type="hidden" name="date2" value="'.$_SESSION['datet'].'">

                <div class="control-group">
                    <label class="col-md-3"></label>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </div>
                </div>

           
                    ';
                }
            }
            ?>
 </form>
            
            </div>
        
    </div>
    <!--/.content-->
</div>

    <!--/.span9-->
    <?php
    
    if(isset($_POST['submit']))
    {
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $company = $_POST['company'];
        $designation = $_POST['designation'];
        $dob = $_POST['dob'];
        $username = $_POST['uname'];
        $password = sha1($_POST['password']);
        $room = $_POST['room'];

        $num_pax = $_POST['num_pax'];

        $datef = $_POST['date1'];
        $datet = $_POST['date2'];

        $dateFrom = date_create($datef);
        $dateTo = date_create($datet);

        $diff = date_diff($dateFrom, $dateTo);
        $num_nights = $diff->format("%d");


    $q = mysqli_query($con,"
        insert into tblcustomer(
            fname,
            mname,
            lname,
            address,
            contact,
            email,
            company,
            designation,
            dob,
            username,
            password,
            status
        ) values (
            '$fname',
            '$mname',
            '$lname',
            '$address',
            '$contact',
            '$email',
            '$company',
            '$designation',
            '$dob',
            '$username',
            '$password',
            1
        )
        ");
    if($q == true)
    {
        $q1 = mysqli_query($con,"select max(id) as id from tblcustomer");
        $row=mysqli_fetch_array($q1);
        $q2 = mysqli_query($con,"select * from tblroom where name = '$room' ");
        $row2=mysqli_fetch_array($q2);

        $customerid = $row['id'];
        $rate = $row2['rate'];

        $prod = $rate * $num_nights;
        $price = $prod * $num_pax;
        $tax = $price * 0.12;
        $total = $price + $tax;

        $roomid = $row2['id'];

        $q3 = mysqli_query($con,"
            insert into tblreservation (
                roomID,
                customerID,
                dateFrom,
                dateTo
            ) values (
                '$roomid',
                '$customerid',
                '$datef',
                '$datet'
            )
            ");

        if($q3 == true)
        {
            $q4 = mysqli_query($con,"select max(id) as resid from tblreservation");
            $row3 = mysqli_fetch_array($q4);

            $resid = $row3['resid'];

            $q5 = mysqli_query($con,"
                insert into tblbilling (
                    reservationID,
                    roomrate,
                    others,
                    num_night,
                    num_pax,
                    discount,
                    total,
                    status
                ) values (
                    '$resid',
                    '$rate',
                    0,
                    '$num_nights',
                    '$num_pax',
                    0,
                    '$total',
                    'Paid'
                )
                ");

            if($q5 == true)
            {
                header("location:".$_SERVER['REQUEST_URI']);
            }
        }
    }

    }
    ?>

<?php include('include/footer.php'); ?>
<?php include('scripts/daterange.php'); ?>
<script src="scripts/custom.js"></script>

<script type="text/javascript">
    <?php if(isset($_POST['submit'])) echo '$.jGrowl("Walkin Reserved Successfully!");'; ?>
</script>