<?php
include('conn.php');
	
	if(!isset($_GET['id']))
	{
		header("location: room.php");
	}
	elseif(!isset($_SESSION['user']))
	{
		header("location: login.php");
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
<script>
  function linker(obby, nextDatebox) {
    var setDate = obby.date;

    setDate.adj(2,1);
    minDate = this.callFormat('%Y-%m-%d', setDate);
    $('#'+nextDatebox).attr('min',minDate);
    $('#'+nextDatebox).datebox('applyMinMax');
    $('#'+nextDatebox).datebox('open');
       
  };
</script>
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
		$id = $_GET['id'];

			if(isset($_POST['reserved_room']))
			{
				if($_POST['dateFrom'] == "" || $_POST['dateTo'] == "")
				{
					$notif = "<b><h3>Please choose dates first.</h3></b>"; 
				}
				else
				{
					$dateFrom = $_POST['dateFrom'];
					$dateTo = $_POST['dateTo'];
					$dateF = date_create($dateFrom);
				    $dateT = date_create($dateTo);

				    $diff = date_diff($dateF, $dateT);
					$num_nights = $diff->format("%d");

					$num_pax = $_POST['num_pax'];

					$userid = $_SESSION['user'];

					$q2 = mysqli_query($con, "select * from tblroom where id = $id");
					while($row2 = mysqli_fetch_array($q2))
					{
						if($row2['type'] == 1)
						{
							$rate = $row2['rate'];
						}
						else
							$rate = $row2['rate'];
					}

					$prod = $rate * $num_nights;
					$price = $prod * $num_pax;
					$tax = $price * 0.12;
					$total = $price + $tax;

					mysqli_query($con,"
						insert into tblreservation (
						roomID,
						customerID,
						dateFrom,
						dateTo 
						)
						values (
						'$id',
						'$userid',
						'$dateFrom',
						'$dateTo'
						)");

					$last_id = mysqli_insert_id($con);
					

					$q1 = mysqli_query($con, "
						insert into tblbilling (
						reservationID,
						roomrate,
						others,
						num_night,
						num_pax,
						discount,
						total,
						status
						) values (
						'$last_id',
						'$rate',
						0,
						'$num_nights',
						'$num_pax',
						0,
						'$total',
						'Pending'
						)");

					if($q1 == true)
					{
						$notif = "Successfully Reserved";
					}
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
   
   	<h3>
	   Reservation
	</h3>
	<form class="form-inline" method="post" action='<?php echo $_SERVER['REQUEST_URI'];?>'>
  	 <div data-role="collapsible">
  	 <?php
  	  $q1 = mysqli_query($con, "select * from tblroompicture where roomID = $id ");
      while($row1 = mysqli_fetch_array($q1))
      {
        echo '
            <img src="../admin/images/rooms/'.basename($row1['path']).'" style="width:251px; height:220px; margin-bottom: 10px;"/><br>
        ';
      }


      $q = mysqli_query($con, "select * from tblroom where id = $id ");
      while($row = mysqli_fetch_array($q))
      {
          
        echo '
                <h4>Room Details</h4>
                <b>'.$row['name'].'</b>
                <p>Pax: '.$row['capacity'].'</p>';
            if($row['type'] == 1)
            {
              echo '
                <label>Price: P'.$row['rate'].'/night</label>
              ';
            }
            else
            {
              echo '
                <label>Price: P'.$row['rate'].'/head</label>';
            }
            echo ' <p>Description: '.$row['description'].'</p>
          ';
      }
    ?>
	</div>

   
   <<p>
   Select Date From:
   </p>
   <input type="text" id="in_date" name="dateFrom" data-role="datebox" data-options='{"mode": "calbox", "useNewStyle":true, "useFocus": true, "afterToday":true, "closeCallback":"linker", "closeCallbackArgs": ["out_date"]}'>

   <p>
   Select Date To:
   </p> 
   <input type="text" id="out_date" name="dateTo" data-role="datebox" data-options='{"mode": "calbox", "useNewStyle":true, "useFocus": true}'>

   <?php
   	$q = mysqli_query($con, "select * from tblroom where id = $id ");
    while($row = mysqli_fetch_array($q))
    {
	   	if($row['type'] == 2)
	   	{

	   		echo '
	   		<p>
		    Number of Person(s):
		    </p> 
	   		<select name="num_pax" data-mini="true">
	            <option>1</option>
	            <option>2</option>
	            <option>3</option>
	            <option>4</option>
	            <option>5</option>
	        </select>
	   		';
	   	}
	   	else
	   		echo '<input type="hidden" name="num_pax" value="1">';

   	}
   ?>


  <button type="submit" class="ui-btn ui-btn-b" name="reserved_room" >Reserve</button>
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

<?php
	}
?>