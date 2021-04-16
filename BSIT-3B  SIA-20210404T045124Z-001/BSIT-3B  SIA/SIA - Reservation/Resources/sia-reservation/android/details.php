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


        <table data-role="table" id="movie-table-custom" data-mode="reflow" class="movie-list ui-responsive">
            <thead>
                <tr>
                    <th data-priority="1">Room</th>
                    <th style="width:20%">Date</th>
                    <th data-priority="2">Other Fees</th>
                    <th data-priority="3">No. of nights</th>
                    <th data-priority="4">No. of Pax</abbr></th>
                    <th data-priority="5">Discount</th>
                    <th data-priority="6">Total</th>
                    <th data-priority="7">Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
              
                if(isset($_GET['roomid']))
                {
                $id_room = $_GET['roomid'];
                $id = $_SESSION['user'];
                $q = mysqli_query($con,"SELECT * 
                        FROM tblbilling
                        LEFT JOIN tblreservation on tblbilling.reservationID=tblreservation.id
                        where tblreservation.customerID=$id and tblreservation.roomID = '$id_room'");
               $i = 0;
                while($row = mysqli_fetch_array($q))
                {
                    $id = $row['reservationID'];
                    $roomid = $row['roomID'];
                    $tmp = strtotime($row['dateFrom']);
                    $from = date('M d, Y',$tmp);
                    $tmp = strtotime($row['dateTo']);
                    $to = date('M d, Y',$tmp);

                    $q1 = mysqli_query($con, "select * from tblroom where id = $roomid");
                    $row1 = mysqli_fetch_array($q1);
                    echo '
                        <tr>
                            <th>'.$row1['name'].'</th>
                            <td>'.$from.' to '.$to.'</td>
                            <td>'.$row['others'].'</td>
                            <td>'.$row['num_night'].'</td>
                            <td>'.$row['num_pax'].'</td>
                            <td>'.$row['discount'].'</td>
                            <td>'.$row['total'].'</td>';

                        if($row['status'] == 'Pending')
                        { 
                            $a = mysqli_query($con, "select reservationID 
                                                    from tblbilling 
                                                    where reservationID = '$id' ");
                            $row_a = mysqli_num_rows($a);
                            // TODO button cancel
                            echo '<td>
                            

                            <a href="#popupDialog'.$i.'" data-rel="popup" data-sfid="'.$row_a['reservationID'].'" data-position-to="window" data-transition="pop" class="inline" style="width:70px; color:red">Cancel</a>
                            <div data-role="popup" data-history="false" id="popupDialog'.$i.'" data-theme="a" style="max-width:400px;">
                                <form method="post" action="'.$_SERVER['REQUEST_URI'].'" >
                                <div class="ui-content">
                                    
                                    <h3 class="ui-title">Are you sure you want to cancel your reservation?</h3>
                                    
                                    <input onclick="pload()" type="submit" data-theme="b" data-rel="back" value="No">
                                    <input onclick="pload()" type="submit" data-theme="b" name="yes" onclick="pload()"  value="Yes">
                                    <input type="hidden" name="hidden1" value="'.$id.'"/>
                                    
                                </div>
                                </form>   
                            </div>

                            

                            </td>';
                            $i++;
                        }
                        else
                            echo '<td style="color:green">'.$row['status'].'</td>';
                    echo '</tr>
                        ';
                }}
                ?>


                
            </tbody>
        </table>
                 
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
