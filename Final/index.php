<?php
    session_start();
    if(!isset($_SESSION['0']))
        {
        header('location:login.php');
        }
 ?>
 <?php include 'header.php'; ?>
 <?php header('Refresh: 20'); ?>

 <style>
 </style>