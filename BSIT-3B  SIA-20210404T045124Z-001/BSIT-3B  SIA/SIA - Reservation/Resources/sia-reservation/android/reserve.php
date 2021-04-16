<?php
include('conn.php');
    if(!isset($_SESSION['user']))
    {
        header("location:index.php");
    }
    else
    {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>iHotel</title>
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/table.css">
	<link rel="stylesheet" href="css/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="css/jqm-demos.css">
	<script src="js/jquery.js"></script>
	<script src="js/index.js"></script>
	<script src="js/jquery.mobile-1.4.5.min.js"></script>
	<script src="cordova.js"></script>
   
</head>
<body>
<script type="text/javascript">
        function pload(){
            location.reload();
        }
</script>
    <div data-role="page" class="jqm-demos">

        <div data-role="header" class="jqm-header">
    		<h2><a href="index.php"><img src="img/jquery-logo.png" alt="jQuery Mobile"></a></h2>
            
        </div><!-- /header -->

    <div role="main" class="ui-content">
        <p>Hotel Reservation Android App</p>

                <?php
                    if(isset($_POST['yes']))
                    {
                        $qd = mysqli_query($con, "delete from tblbilling where reservationID = '".$_POST['hidden1']."' ");
                        $qd2 = mysqli_query($con, "delete from tblreservation where id = '".$_POST['hidden1']."' ");
                        header("Location: reserve.php");
                    }
                ?>


        
                <?php
              
                $q1 = mysqli_query($con,"SELECT * from tblroom");
                while($row = mysqli_fetch_array($q1))
                {
                    $id = $row['id'];
                    $q = mysqli_query($con,"SELECT * from tblroompicture where roomID = '$id' ");
                    $row1 = mysqli_fetch_array($q);

                    $roomid1 = $row1['roomID'];
                
                    echo '
                    <form method="post">
                    <ul data-role="listview" data-inset="true" data-count-theme="b">
                        <li>
                        <a href="details.php?roomid='.$roomid1.'" data-ajax="false">
                            <img src="../admin/images/rooms/'.basename($row1['path']).'" style="width:100%; height:100%;">
                            <h2>'.$row['name'].'</h2>
                            <p>Max Person: <b>'.$row['capacity'].'</b></p>
                            <span class="ui-li-count">P '.$row['rate'].'</span>
                            <inpu type="hidden" name="hidden_room" value="1">
                        </a>
                        </li>
                        </ul>
                    </form>';
                }

                ?>

                 
    	<div data-role="footer" data-position="fixed" data-tap-toggle="false" class="jqm-footer">
    		<p>Capstone Project </p>
    		<p>Copyright 2015</p>
    	</div><!-- /footer -->
	
    </div>


</div><!-- /page -->

</body>
</html>
<?php
    }
?>
