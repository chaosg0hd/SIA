<?php
ob_start();
include 'functions.php';

//Initialization

$action = $_GET['action'];
$crud = new Action();

//Redirect

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
