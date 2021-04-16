<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Navigation Page</title>
	<?php include('./header.php'); ?>
	<?php include('./db_connect.php'); ?>
    <?php 
    //session_start();
    //if(isset($_SESSION['login_id']))
    //header("location:login.php");
?>

</head>
<style>
    .button {
      border: none;
      color: white;
      padding: 60px 60px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 20px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      position: relative;
      top: 200px;
    }
    .button1 {
        background-image: url( 'customer.png' );
        background-repeat: no-repeat;
        background-size: 150px 150px;
      color: transparent; 
      border: 2px solid #5f6e3c;
    }
    .button1:hover {
      background-color: #5f6e3c;
      color: white;
    }
    .button2 {
        background-image: url( 'point-of-sale.png' );
        background-repeat: no-repeat;
        background-size: 140px 140px; 
      color: transparent; 
      border: 2px solid #5f6e3c;
    }
    .button2:hover {
      background-color: #5f6e3c;
      color: white;
    }
    .button3 {
        background-image: url( 'menu.png' );
        background-repeat: no-repeat;
        background-size: 140px 140px;
      color: transparent; 
      border: 2px solid #5f6e3c;
    }
    .button3:hover {
      background-color: #5f6e3c;
      color: white;
    }
    .button4 {
        background-image: url( 'shipping.png' );
        background-repeat: no-repeat;
        background-size: 130px 130px;
      color: transparent; 
      border: 2px solid #5f6e3c;
    }
    .button4:hover {
      background-color: #5f6e3c;
      color: white;
    }
    .button5 {
        background-image: url( 'calendar.png' );
        background-repeat: no-repeat;
        background-size: 150px 150px;
      color: transparent; 
      border: 2px solid #5f6e3c;
    }
    .button5:hover {
      background-color: #5f6e3c;
      color: white;
    }
    .button6 {
        background-image: url( 'salary.png' );
        background-repeat: no-repeat;
        background-size: 135px 135px; 
      color: transparent; 
      border: 2px solid #5f6e3c;
    }
    .button6:hover {
      background-color: #5f6e3c;
      color: white;
    }
    .button7 {
        background-image: url( 'megaphone.png' );
        background-repeat: no-repeat;
        background-size: 140px 140px;
      color: transparent; 
      border: 2px solid #5f6e3c;
    }
    .button7:hover {
      background-color: #5f6e3c;
      color: white;
    }
    .button8 {
        background-image: url( 'money.png' );
        background-repeat: no-repeat;
        background-size: 140px 140px; 
      color: transparent; 
      border: 2px solid #5f6e3c;
    }
    .button8:hover {
      background-color: #5f6e3c;
      color: white;
    }
    body{
        background-color: #cdd5c4; 
    }
</style>
<body>
    <center>
        <a href="./CMS/index.php"><button class="button button1">Customer Management</button></a>
        <a href="./POS/PHP/index.php"><button class="button button2">Point of Sale</button></a>
        <a href="./MMS/index.php"><button class="button button3">Menu Management</button></a>
        <a href="./IMS/index.php"><button class="button button4">Inventory Management</button></a>        
        <br>
        <a href="./DTR/admin/index.php"><button class="button button5">Daily Time Record Management</button></a>
        <a href="./PMS/index.php"><button class="button button6">Payroll Management</button></a>
        <a href="./MAR/index.html"><button class="button button7">Marketing Management</button></a>
        <a href="./FMS/index.php"><button class="button button8">Finance Management System</button></a>
    </center>
<script>
</script>

</body>
</html>
