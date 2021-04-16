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
	<script src="cordova.js"></script>
</head>
<body>
    <div data-role="page" class="jqm-demos">

        <div data-role="header" class="jqm-header">
    		<h2><a href="index.php"><img src="img/jquery-logo.png" alt="jQuery Mobile"></a></h2>
            
        </div><!-- /header -->

        <div role="main" class="ui-content">
    <p>Hotel Reservation Android App</p>
	<br>

   
     <ul data-role="listview">
 		<li><a href="introduction.html">Introduction</a></li>
      	<li><a href="room.php">Rooms</a></li>
        <li><a href="credits.html">Credits</a></li>
        <li><a href="about.html">About</a></li>
       <!-- <li><a href="feedback.php">Feedback</a></li>-->
        <?php
        session_start();
        if(!isset($_SESSION['user']))
        {
        	echo '<li><a data-ajax="false" href="login.php">Login</a></li>';
        }
        else
        	echo '
                <li><a data-ajax="false" href="reserve.php">My Reservation</a></li>
                <li><a data-ajax="false" href="profile.php">My Profile</a></li>
                <li><a data-ajax="false" href="logout.php">Logout</a></li>
            ';
        ?>
     </ul>  
        
            
                   
	<div data-role="footer" data-position="fixed" data-tap-toggle="false" class="jqm-footer">
		<p>Capstone Project </p>
		<p>Copyright 2015</p>
	</div><!-- /footer -->
	
</div>


</div><!-- /page -->

</body>
</html>
