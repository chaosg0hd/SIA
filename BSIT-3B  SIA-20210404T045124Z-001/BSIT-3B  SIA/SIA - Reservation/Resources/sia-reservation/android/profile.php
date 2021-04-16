<?php
include('conn.php');
    if(!isset($_SESSION['user']))
    {
        header("location:index.php");
    }
    else
    {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>iHotel</title>
    <link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/jqm-demos.css">
	<script src="js/jquery.js"></script>
	<script src="js/index.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script src="cordova.js"></script>
</head>
<body>
    <div data-role="page" class="jqm-demos">

        <div data-role="header" class="jqm-header">
    		<h2><a href="index.php"><img src="img/jquery-logo.png" alt="jQuery Mobile"></a></h2>
            
        </div><!-- /header -->

        <div role="main" class="ui-content">
    <h3><b>My Profile</b></h3>
	<br>

        <?php

            if(isset($_POST['save']))
            {
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $address = $_POST['address'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $company = $_POST['company'];
                $designation = $_POST['designation'];
                $bdate = $_POST['bdate'];
                $uname = $_POST['uname'];
                $pass = sha1($_POST['pass']);

                $q = mysqli_query($con,"update tblcustomer set 
                    fname = '$fname',
                    mname = '$mname',
                    lname = '$lname',
                    address = '$address',
                    contact = '$contact',
                    email = '$email',
                    company = '$company',
                    designation = '$designation',
                    dob = '$bdate',
                    username = '$uname',
                    password = '$pass'
                    where
                    id = '".$_SESSION['user']."'
                    ");
            }
            // TODO profile 
            $q = mysqli_query($con, "select * from tblcustomer where id = '".$_SESSION['user']."' ");
            while($row = mysqli_fetch_array($q))
            {
                if(!isset($_POST['edit']))
                {
                echo '
                <form class="form-inline" method="post" action="'.$_SERVER['REQUEST_URI'].'">

                    <p>First Name:</p>
                    <input type="text" name="fname" id="id_fname" value="'.$row['fname'].'" readonly>

                    <p>Middle Name:</p>
                    <input type="text" name="mname" id="id_mname" value="'.$row['mname'].'" readonly>

                    <p>Last Name:</p>
                    <input type="text" name="lname" id="id_lname" value="'.$row['lname'].'" readonly>

                    <p>Address:</p>
                    <input type="text" name="address" id="id_address" value="'.$row['address'].'" readonly>

                    <p>Contact #:</p>
                    <input type="text" name="contact" id="id_contact" value="'.$row['contact'].'" readonly>

                    <p>Email:</p>
                    <input type="email" name="email" id="id_email" value="'.$row['email'].'" readonly>

                    <p>Company:</p>
                    <input type="text" name="company" id="id_company" value="'.$row['company'].'" readonly>

                    <p>Designation:</p>
                    <input type="text" name="designation" id="id_designation" value="'.$row['designation'].'" readonly>

                    <p>Birthdate:</p>
                    <input type="date" name="bdate" id="id_dob" value="'.$row['dob'].'" readonly>

                    <p>Username:</p>
                    <input type="text" name="uname" id="id_uname" value="'.$row['username'].'" readonly>

                    <p>Password:</p>
                    <input type="text" name="pass" id="id_pass" placeholder="Password" readonly>

                    <button type="submit" class="ui-btn ui-btn-b" name="edit">Edit</button>

                </form>

                ';
                }
                else
                    echo '
                    <form class="form-inline" method="post" action="'.$_SERVER['REQUEST_URI'].'">

                    <p>First Name:</p>
                    <input type="text" name="fname" id="id_fname" value="'.$row['fname'].'">

                    <p>Middle Name:</p>
                    <input type="text" name="mname" id="id_mname" value="'.$row['mname'].'" >

                    <p>Last Name:</p>
                    <input type="text" name="lname" id="id_lname" value="'.$row['lname'].'" >

                    <p>Address:</p>
                    <input type="text" name="address" id="id_address" value="'.$row['address'].'" >

                    <p>Contact #:</p>
                    <input type="text" name="contact" id="id_contact" value="'.$row['contact'].'" >

                    <p>Email:</p>
                    <input type="email" name="email" id="id_email" value="'.$row['email'].'" >

                    <p>Company:</p>
                    <input type="text" name="company" id="id_company" value="'.$row['company'].'">

                    <p>Designation:</p>
                    <input type="text" name="designation" id="id_designation" value="'.$row['designation'].'">

                    <p>Birthdate:</p>
                    <input type="date" name="bdate" id="id_dob" value="'.$row['dob'].'" >

                    <p>Username:</p>
                    <input type="text" name="uname" id="id_uname" value="'.$row['username'].'" >

                    <p>Password:</p>
                    <input type="text" name="pass" id="id_pass" placeholder="Password">

                    <button type="submit" class="ui-btn ui-btn-b" name="save">Save</button>

                </form>
                ';
            }
        ?>
   
                   
	<div data-role="footer" data-position="fixed" data-tap-toggle="false" class="jqm-footer">
		<p>Capstone Project </p>
		<p>Copyright 2015</p>
	</div><!-- /footer -->
	
</div>


</div><!-- /page -->

</body>
</html>
<?php
    }
?>