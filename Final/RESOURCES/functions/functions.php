<?php
session_start();
ini_set('display_errors', 1);

Class Action {

	//Initialization

	private $db;

	public function __construct(){
		include '../conn.php';
		$this->db = $conn;
		ob_start(); 	
	}
	function __destruct(){
	    $this->db->close();
	    ob_end_flush();
	}

	//Functions 

	//Login

	function login(){
		extract($_POST);
		$login = $this->db->query("SELECT * FROM users where user_name = '".$username."' and user_password = '".$password."' ");
		if($login->num_rows > 0){

			while($access = $login->fetch_assoc()){			
					$_SESSION['Name_'] = $access['user_name'];
					$_SESSION['Access_'] = $access['user_privilege'];
					$_SESSION['Image_'] = $access['user_image'];
			}				
			return 1;
		}
		else{
			return 0;
		}
	}	
}