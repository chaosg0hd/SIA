<?php 
	class Auth {
		private $conn;
		private $sql;
		private $data = array();
		private $info = [];
		private $status =array();
		private $failed_stat = array(
			'remarks'=>'failed',
			'message'=>'Failed to retrieve the requested records'
		);
		private $success_stat = array(
			'remarks'=>'success',
			'message'=>'Successfully retrieved the requested records'
		);

		public function __construct($db){
			$this->conn = $db;
		}

		function encryptPassword($pword): ?string {
			$hashFormat="$2y$10$";
			$saltLength=22;
			$salt=$this->generateSalt($saltLength);
			return crypt($pword, $hashFormat.$salt);
		}

		function generateSalt($len){
			$urs=md5(uniqid(mt_rand(), true));
			$b64String=base64_encode($urs);
			$mb64String=str_replace('+','.', $b64String);
			return substr($mb64String, 0, $len);
		}

		function register_user($dt) {
			$payload = $dt;
			$encryptedPassword = $this->encryptPassword($dt->pword);

			$payload = array(
				'uname'=>$dt->uname,
				'pword'=>$this->encryptPassword($dt->pword)
			);

			$this->sql = "INSERT INTO tbl_user(usr_username, usr_password, usr_firstname, usr_lastname, usr_role) VALUES ('$dt->uname', '$encryptedPassword', '$dt->fname', '$dt->lname', $dt->role)";
			$this->conn->query($this->sql);

			$this->data = $payload;

			return array(
				'status'=>$this->status,
				'payload'=>$this->data,
				'prepared_by'=>'Jimboi Austria, s2d3nt',
				'timestamp'=>date('D M j, Y G:i:s T')
			);
		}
		function login_user($dt){
			$uname = $this->conn->real_escape_string($dt->uname);
			$pword = $this->conn->real_escape_string($dt->pword);

			$this->sql="SELECT * FROM tbl_user WHERE usr_username='$uname' LIMIT 1";

			if($result=$this->conn->query($this->sql)){
				if($result->num_rows>0){
					$res=$result->fetch_assoc();
					if($this->pwordCheck($pword, $res['usr_password'])){
				http_response_code(200);
				$this->data = array(
					'fname'=>$res['usr_firstname'],
					'lname'=>$res['usr_lastname'],
					'role'=>$res['usr_role'],
				);
				$this->status = array(
					'remarks'=>'success',
					'message'=>'Successfully loged in',
				);


			}else{
				http_response_code(401);
				$this->status = array(
					'remarks'=>'failed',
					'message'=>'Incorrect username or password',
				);
			}
			}else{
				http_response_code(401);
				$this->status = array(
					'remarks'=>'failed',
					'message'=>'Incorrect username or password',
				);
			}
		}else{
				http_response_code(401);
				$this->status = array(
					'remarks'=>'failed',
					'message'=>'Incorrect username or password',
				);
			}
			return array(
				'status'=>$this->status,
				'payload'=>$this->data,
				'prepared_by'=>'Jimboi Austria, s2d3nt',
				'timestamp'=>date('D M j, Y G:i:s T')
			);
		}
		function pwordCheck($pw, $existingpw){
			$hash=crypt($pw, $existingpw);
			if($hash === $existingpw){return true;} else {return false;}
		}
		

	}
?>