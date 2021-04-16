<?php

  if(!isset($_GET['id']))
  {
    header("location: room.php");
  }
  else
  {

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" http-equiv="refresh">
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
\
  function linker(obby, nextDatebox) {
    var setDate = obby.date;

    setDate.adj(2,1);
    minDate = this.callFormat('%Y-%m-%d', setDate);
    $('#'+nextDatebox).attr('min',minDate);
    $('#'+nextDatebox).datebox('applyMinMax');
    $('#'+nextDatebox).datebox('open');
       
  };
</script>

    
<?php
      include('conn.php');
      $id = $_GET['id'];

      if(isset($_POST['reserved_room']))
      {
        if($_POST['dateFrom'] == "" || $_POST['dateTo'] == "")
        { 
          $availability = "<b><h3 style='color: red;'>Please choose dates first.</h3></b>"; 
        }  
        else
        {
            $dateFrom = $_POST['dateFrom'];
            $dateTo = $_POST['dateTo'];
            $q = mysqli_query($con,"SELECT * FROM tblreservation WHERE roomID = $id and ((tblreservation.dateFrom BETWEEN '$dateFrom' and '$dateTo') or (tblreservation.dateTo BETWEEN '$dateFrom' and '$dateTo'))");
            if(mysqli_num_rows($q) > 0)
            {
              while($row=mysqli_fetch_array($q))
              {
                $tmp = strtotime($row['dateFrom']);
                $from = date('M d, Y',$tmp);
                $tmp = strtotime($row['dateTo']);
                $to = date('M d, Y',$tmp);

                  $q1 = mysqli_query($con, "select tblroompicture.path, tblroompicture.roomID, tblroom.name, tblroom.id from tblroompicture left join tblroom on tblroompicture.roomID = tblroom.id where tblroompicture.roomID = $id");
                  $row1 = mysqli_fetch_array($q1);
                  
                    $availability = 
                    '
                      <br>
                      <div><label><b>Room Availability :</b></label></div>
                        <center>
                          <img src="../admin/images/rooms/'.basename($row1['path']).'" style="width:251px; height:220px; margin-bottom: 10px;"/>
                        </center>

                        <h2>'.$row1['name'].'</h2>
                        <p>This Room was reserved from <b>'.$from.'</b> to <b>'.$to.'</b></p>
                    ';
                
              }
            }
            else
            {
                $q1 = mysqli_query($con, "select tblroompicture.path, tblroompicture.roomID, tblroom.name, tblroom.id from tblroompicture left join tblroom on tblroompicture.roomID = tblroom.id where tblroompicture.roomID = $id");
                $row1 = mysqli_fetch_array($q1);

                if(isset($_SESSION['user']))
                {
                  $availability =
                    '
                      <br>
                      <div><label><b>Room Availability :</b></label></div>
                        <center>
                          <img src="../admin/images/rooms/'.basename($row1['path']).'" style="width:251px; height:220px; margin-bottom: 10px;">
                        </center>

                        <h2>'.$row1['name'].'</h2>
                    <p>This Room is available</p>
                    <a href="book.php?id='.$id.'" style="text-decoration:none; color:white;"><button class="ui-btn ui-btn-b">Book Now</button></a>
                  ';
                }
                else
                $availability =
                    '
                      <br>
                      <div><label><b>Room Availability :</b></label></div>
                        <center>
                          <img src="../admin/images/rooms/'.basename($row1['path']).'" style="width:251px; height:220px; margin-bottom: 10px;">
                        </center>

                        <h2>'.$row1['name'].'</h2>
                    <p>This Room is available</p>
                    <a href="login.php" style="text-decoration:none; color:white;"><button class="ui-btn ui-btn-b">Book Now</button></a>
                ';
            } 
        }
        
      }
    
?>
</head>
<body>

    <div data-role="page" class="jqm-demos">

        <div data-role="header" class="jqm-header">
    		<h2><a href="index.php" title="jQuery Mobile Demos home"><img src="img/jquery-logo.png" alt="jQuery Mobile"></a></h2>
            <a href="room.php" class="jqm-search-link ui-btn ui-btn-icon-notext ui-corner-all   ui-icon-arrow-l ui-nodisc-icon ui-alt-icon ui-btn-left">Search</a>

        </div><!-- /header -->

        <div role="main" class="ui-content">
        
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
                <p>Price: P'.$row['rate'].'/night</p>
              ';
            }
            else
            {
              echo '
                <p>Price: P'.$row['rate'].'/head</p>';
            }
            echo ' <p>Description: '.$row['description'].'</p>
          ';
      }
    ?>
        </div>
   <form class="form-inline" method="post" action='<?php echo $_SERVER['REQUEST_URI'];?>'>
   <p>
   Select Date From:
   </p>
   <input type="text" id="in_date" name="dateFrom" data-role="datebox" data-options='{"mode": "calbox", "useNewStyle":true, "useFocus": true, "afterToday":true, "closeCallback":"linker", "closeCallbackArgs": ["out_date"]}'>

   <p>
   Select Date To:
   </p> 
   <input type="text" id="out_date" name="dateTo" data-role="datebox" data-options='{"mode": "calbox", "useNewStyle":true, "afterToday":true, "useFocus": true}'>

  <button type="submit" class="ui-btn ui-btn-b" name="reserved_room" >Check</button>
  </form>
  </div>
  <?php if(isset($availability)) echo $availability;?>

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
