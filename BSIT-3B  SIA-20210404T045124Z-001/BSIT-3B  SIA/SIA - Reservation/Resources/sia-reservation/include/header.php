<?php
    include('conn.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
    <link href="assets/css/jquery-ui.min.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
	<link rel="stylesheet" href="assets/css/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/datatables/dataTables.bootstrap.css">
<style>
.table tbody>tr>td.vert-align{
    vertical-align: middle;
}    
</style>
</head>
<body >
    
    <div class="navbar navbar-inverse navbar-fixed-top" >
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="admin/images/logo.png" width="30px" height="30px"> iHOTEL</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                     <li><a href="rooms.php">ROOMS</a></li>
                      <li><a href="contact.php">CONTACT US</a></li>
                    <li class="<?php if(isset($_SESSION['username']))echo 'hide';?>" ><a href="login.php">LOGIN</a></li>
                    <li class="<?php if(!isset($_SESSION['username']))echo 'hide';?>" ><a href="reservation.php">MY RESERVATION</a></li>
                    <li class="<?php if(!isset($_SESSION['username']))echo 'hide';?>" ><a href="logout.php">LOGOUT</a></li>
                </ul>
            </div>
           
        </div>
    </div>
   <!--/.NAVBAR END-->