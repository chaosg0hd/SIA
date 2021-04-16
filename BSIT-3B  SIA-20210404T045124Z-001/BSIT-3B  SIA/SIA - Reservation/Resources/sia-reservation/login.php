<?php
	include('conn.php');
	$access = isset($_SESSION['access']) ? $_SESSION['access']: null;
    if($access == 1){
        header('location:admin/');
    }
	
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "select * from tbluser where username='$username' and password='$password' and stype='admin'";
		$result = $con->query($sql);
		if($result->num_rows > 0){
			$row = $result->fetch_object();
			$_SESSION['access'] = 1;
			$_SESSION['id'] = $row->id;
			$_SESSION['username'] = $row->username;
			header('location:admin/index.php');
		}else{            
            $sql = "select * from tblcustomer where username='$username' and password='$password'";
		    $result = $con->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_object();
                if($row->status!=1){
                    $inactive = 1;
                }else{
                    $_SESSION['username'] = $row->username;
                    $_SESSION['id'] = $row->id;
                    header('location:rooms.php');
                }       
            }else{
                $error = 1;  
            }
        }
	}

    if(isset($_GET['email'])){
        $email = $_GET['email'];
        $code = $_GET['code'];
        $q = "update tblcustomer set status=1 where email='$email' and password='$code'";
        $con->query($q);
        $confirm_email = 1;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link type="text/css" href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="admin/css/theme.css" rel="stylesheet">
	<link type="text/css" href="admin/images/icons/css/font-awesome.css" rel="stylesheet">
	
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<li><a href="register.php">
							Sign Up
						</a></li>

						

						<li><a href="#">
							Forgot your password?
						</a></li>
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="POST">
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
						<div class="module-body">
                            <div class="control-group alert alert-danger text-danger <?php if(!isset($error)) echo 'hide';?>">
                                Invalid username/password! Please try again!
                            </div>
                            <div class="control-group alert alert-warning text-warning <?php if(!isset($inactive)) echo 'hide';?>">
                                Your account is not yet activated. Thank you!
                            </div>
                            <div class="control-group alert alert-success text-warning <?php if(!isset($confirm_email)) echo 'hide';?>">
                                Account confirmed. You can now login to your account. Thank you!
                            </div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" placeholder="Username" name="username">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" id="inputPassword" placeholder="Password" name="password">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right" name="login">Login</button>
									
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
		</div>
	</div>
	<script src="admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>