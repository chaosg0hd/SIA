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

    <h3><b>Feedback</b></h3>

    <?php
        include('conn.php');
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $desc = $_POST['desc'];

            $q = mysqli_query($con,"
                insert into tblservice (
                name,
                description
                ) values (
                '$name',
                '$desc')
                ");
            if($q == true)
            {
                $notif = '<label style="color:green;"><b>Feedback Successfully Send !</b></label>';
            }
        }
        // TODO feedback
    ?>
    <form method="post" action='<?php echo $_SERVER['REQUEST_URI'];?>'>  
        <input type="text" placeholder="Name" name="name">
        <textarea placeholder="Description" name="desc"></textarea> 
        <button type="submit" class="ui-btn ui-btn-b" name="submit" >Submit</button>
    </form> 
      
    <?php if(isset($notif)) echo $notif;?>             

	<div data-role="footer" data-position="fixed" data-tap-toggle="false" class="jqm-footer">
		<p>Capstone Project </p>
		<p>Copyright 2015</p>
	</div><!-- /footer -->
	
</div>


</div><!-- /page -->

</body>
</html>
