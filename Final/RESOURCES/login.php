<!DOCTYPE html>
<html>

<?php 
session_start(); 
session_destroy(); 
?>

<?php include 'header.php'; ?>

<style>
	#div-main {
		width: 100%;
		height:  100%;
	}
	#div-login-right {
		position: absolute;
		right:0;
		width: 60%;
		height: 100%;
		display: flex;
        background: var(--color_secondary);				
		background-image: linear-gradient(to right, rgba(173, 110, 81, .5), rgb(173, 156, 81, .5));
		align-items: center;
	}
	#div-login-left {
		position: absolute;
		left:0;
		width:40%;
		height: calc(100%);
		display: flex;
		align-items: center;
		background: url(./assets/logo.png);
		background-position: center center;
	    background-repeat: no-repeat;
	    background-size: 100% auto;		
	}
	#div-login-right .card {
		margin: auto;
		z-index: 1;
		width:60%;		
		min-width: 160px;
		max-width: 240px;
		border-radius: 10px;
        padding: 10px;
		background: var(--white);
	}
	#login-button {
		font-size: 16px;
	}
</style>

<body>
	<div id="div-main">
  		<div id="div-login-left">  			
  		</div>		
  		<div id="div-login-right">
  			<div id="card" class="card">
  				<div class="card-body">  						
  					<form id="login-form">
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button id="login-button" class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>  
	</div>
</body>

<!-- Login script from old system pls redo, IDK if it works properly, but it works -->

<script>
	$('#login-form').submit(function(e){
		e.preventDefault();
		$('#login-form button[type="login-button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 ){
			$(this).find('.alert-danger').remove();
		}
		$.ajax({
			url:'./functions/ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err);
				$('#login-form button[type="login-button"]').removeAttr('disabled').html('Login');
			},
			success:function(resp){
				console.log(resp);
				if(resp == 1){
					location.href ='index.php?sys=PMS&page=home';
					console.log($access);
				}
				else{
					console.log(resp)
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>

<!-- Script to show session data -->

<script> console.log("<?php echo $_SESSION['Access_']; ?>") </script>

</html>