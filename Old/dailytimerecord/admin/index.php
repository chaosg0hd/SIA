<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>

<div class="img">
  <img src="../images/cocolime.png" alt="Coco lime" style="width:100%">
  </div>
  
  	<div class="head">
  		<b>ADMIN LOGIN</b>
  	</div>
  
  	<div class="text">
    	<p>Sign in | Administrator</p>
		</div>

		<div class="container">
    	<form action="login.php" method="POST">
      		<div class="input">
        		<input type="text" name="username" placeholder="Username" required autofocus>
      		</div>
          <div class="input">
            <input type="password" name="password" placeholder="Password" required>
            
          </div>		
          			<button type="submit" class="button1" name="login">SIGN IN</button>	
					  <?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>