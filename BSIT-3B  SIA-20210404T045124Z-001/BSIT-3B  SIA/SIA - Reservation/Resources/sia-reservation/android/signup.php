<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>iHotel</title>
    <link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/jqm-demos.css">
	<script src="js/jquery.js"></script>
	<script src="js/index.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
    <script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.core.min.js"></script>
<script type="text/javascript" src="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.mode.calbox.min.js"></script>
<script type="text/javascript" src="  http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.mode.datebox.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://dev.jtsage.com/cdn/datebox/latest/jqm-datebox.min.css" />

    
<script type="text/javascript" charset="utf-8" src="cordova.js"></script>
<script type="text/javascript" charset="utf-8" src="js/video.js"></script>

<script type="text/javascript">

function
 init(){ 
document.addEventListener(

"deviceready", console.log('ready'), true);
}

function
playVideo(vidUrl) {
window.plugins.videoPlayer.play(vidUrl);
//window.plugins.videoPlayer.play("file:///android_asset/www/video/cpu.mp4");
}
</script> 

		<?php
		include('conn.php');
			
			if(isset($_POST['signup']))
			{
				$fname = $_POST['fname'];
				$mname = $_POST['mname'];
				$lname = $_POST['lname'];
				$address = $_POST['address'];
				$contact = $_POST['contact'];
				$company = $_POST['company'];
				$designation = $_POST['designation'];
				$email = $_POST['email'];
				$bdate = $_POST['bdate'];
				$uname = $_POST['uname'];
				$pass = sha1($_POST['pass']);

				$q = mysqli_query($con, "
					insert into tblcustomer (
					fname,
					mname,
					lname,
					address,
					contact,
					email,
					company,
					designation,
					dob,
					username,
					password
					) values (
					'$fname',
					'$mname',
					'$lname',
					'$address',
					'$contact',
					'$email',
					'$company',
					'$designation',
					'$bdate',
					'$uname',
					'$pass'
					)");
				if($q == true)
				{
					header("location: room.php");
				}
			}
		?>

</head>
<body>
    <div data-role="page" class="jqm-demos">

        <div data-role="header" class="jqm-header">
    		<h2><a href="index.php" title="jQuery Mobile Demos home"><img src="img/jquery-logo.png" alt="jQuery Mobile"></a></h2>
            <a href="index.php" class="jqm-search-link ui-btn ui-btn-icon-notext ui-corner-all   ui-icon-arrow-l ui-nodisc-icon ui-alt-icon ui-btn-left">Search</a>

        </div><!-- /header -->

    <div role="main" class="ui-content">

		   	<form class="form-inline" method="post" action='<?php echo $_SERVER['REQUEST_URI'];?>'>

		     	<input type="text" data-clear-btn="true" name="fname" id="text-1" placeholder="First Name">
				<input type="text" data-clear-btn="true" name="mname" id="text-1" placeholder="Middle Name">
				<input type="text" data-clear-btn="true" name="lname" id="text-1" placeholder="Last Name">
				<input type="text" data-clear-btn="true" name="address" id="text-1" placeholder="Address">
				<input type="text" data-clear-btn="true" name="contact" id="text-1" placeholder="Contact">
				<input type="email" data-clear-btn="true" name="email" id="text-1" placeholder="Email">
				<input type="text" data-clear-btn="true" name="company" id="text-1" placeholder="Company">
				<input type="text" data-clear-btn="true" name="designation" id="text-1" placeholder="Designation">
				<input type="date" data-clear-btn="true" name="bdate" id="text-1">
				<input type="text" data-clear-btn="true" name="uname" id="text-1" placeholder="Username">
				<input type="password" data-clear-btn="true" name="pass" id="text-1" placeholder="Password">

		  		<button type="submit" class="ui-btn ui-btn-b" name="signup" >Signup</button>

		  		<center>
		  			<a href="login.php" style="text-decoration: none;">Already have an account? Login Now!</a><br>
		  		</center>
		  	</form>

		  	<?php if(isset($notif)) echo $notif;?>

		<div data-role="footer" data-position="fixed" data-tap-toggle="false" class="jqm-footer">
			<p>Capstone Project </p>
			<p>Copyright 2015 </p>
		</div><!-- /footer -->
	
	</div>


</div><!-- /page -->

</body>
</html>