<?php 
	class Post {
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


		function select($table, $filter_data) {
			$this->sql = "SELECT tbl_customers.*, tbl_invoice.inv_num, tbl_invoice.inv_date FROM tbl_customers INNER JOIN tbl_invoice ON tbl_customers.cust_num = tbl_invoice.inv_custno";

			if($filter_data!=null){
				$this->sql.=" WHERE cust_recno='$filter_data'";
			}

			if($result = $this->conn->query($this->sql)){
				if($result->num_rows>0){
					while($res = $result->fetch_assoc()){
						array_push($this->data, $res);
					}
					$this->status = $this->success_stat;
					http_response_code(200);
				}
			}
			return array(
				'status'=>$this->status,
				'payload'=>$this->data,
				'prepared_by'=>'Juan Dela Cruz, SysAd',
				'timestamp'=>date('D M j, Y G:i:s T')
			);
		}

		function add_record($records){
			$this->sql = "INSERT INTO tbl_customers (cust_fname, cust_mname, cust_lname) VALUES ('$records->fname', '$records->mname', '$records->lname')";
			$this->conn->query($this->sql);
			return $this->select('tbl_customers', null);
		}

		function edit_record($records){
			$this->sql = "UPDATE tbl_customers SET cust_fname='$records->fname', cust_mname='$records->mname', cust_lname='$records->lname' WHERE cust_recno=$records->recno";
			$this->conn->query($this->sql);
			return $this->select('tbl_customers', null);
		}

		function delete_record($records){
			$this->sql = "DELETE FROM tbl_customers WHERE cust_recno=$records->recno";
			$this->conn->query($this->sql);
			return $this->select('tbl_customers', null);
		}
	}
?>