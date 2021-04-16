<?php
	session_start();
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'hotel';
	
	$con = mysqli_connect($host,$user,$pass,$db);
?>