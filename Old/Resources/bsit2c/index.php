<?php 
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	include_once './config/Database.php';
	include_once './models/Post.php';
	include_once './models/Auth.php';

	$database = new Database();
	$db = $database->connect();

	$post = new Post($db);
	$auth = new Auth($db);

	$data = array();
	$req = explode('/', rtrim($_REQUEST['request'], '/'));

	switch ($_SERVER['REQUEST_METHOD']) {
		case 'POST':
			switch($req[0]){
				case 'addcustomer':
					$d = json_decode(file_get_contents("php://input"));
					echo json_encode($post->add_record($d));
				break;

				case 'editcustomer':
					$d = json_decode(file_get_contents("php://input"));
					echo json_encode($post->edit_record($d));
				break;

				case 'deletecustomer':
					$d = json_decode(file_get_contents("php://input"));
					echo json_encode($post->delete_record($d));
				break;

				case 'register':
					$d = json_decode(file_get_contents("php://input"));
					echo json_encode($auth->register_user($d));
				break;

				case 'login':
					$d = json_decode(file_get_contents("php://input"));
					echo json_encode($auth->login_user($d));
				break;

				default:
					http_response_code(400);
					echo "Bad Request";
				break;
			}
		break;

		case 'GET':
			switch ($req[0]) {
				case 'customers':
					if(count($req)>1){
						echo json_encode($post->select('tbl_'.$req[0], $req[1]),JSON_PRETTY_PRINT);
					} else {
						echo json_encode($post->select('tbl_'.$req[0], null),JSON_PRETTY_PRINT);
					}
					
				break;
				
				default:
					http_response_code(400);
					echo "Bad Request";
				break;
			}
		break;
		
		default:
			http_response_code(400);
			echo "Bad Request";
		break;
	}

?>