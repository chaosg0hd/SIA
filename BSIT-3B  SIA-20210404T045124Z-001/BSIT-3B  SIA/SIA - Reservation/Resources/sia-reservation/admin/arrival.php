<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $con->query("delete from tblarrival where id=$id");
    }
    $dateNow = date('Y-m-d');
    $q = "SELECT
            tblarrival.id, 
            tblreservation.roomID,tblreservation.customerID,tblreservation.dateFrom,
            tblbilling.num_night, tblbilling.num_pax
        FROM tblarrival
left JOIN tblreservation on tblarrival.reservationID=tblreservation.id
left JOIN tblbilling on tblreservation.id=tblbilling.reservationID
WHERE tblreservation.dateFrom='$dateNow'"; 
    $result = $con->query($q);

function get_roomname($id,$con){
    $row = $con->query("select * from tblroom where id=$id");
    return $row->fetch_object()->name;
}
function get_customername($id,$con){
    $row = $con->query("select * from tblcustomer where id=$id")->fetch_object();
    return $row->fname.' '.$row->lname;
}   
?>
<title>Arrival List</title>
<?php if($result->num_rows > 0): ?>
<div class="span9">
    <div class="content">
        <?php while($row = $result->fetch_object()): ?>
        <div class="btn-controls">
            <div class="btn-box-row row-fluid">            
                <a href="arrival.php?id=<?php echo $row->id;?>" class="btn-box big span4"><i class="icon-user"></i><b><?php echo get_customername($row->customerID,$con);?></b>
                    <p class="text-muted">
                        <?php echo get_roomname($row->roomID,$con);?><br>
                        <?php echo $row->num_night;?> Nights<br>
                        <?php echo $row->num_pax;?> Pax<br>
                        <small>[click here when arrived...]</small>
                    </p>                    
                </a>                
            </div>            
        </div>
        <?php endwhile; ?>
        <!--/#btn-controls-->                
        <!--/.module-->
    </div>
    <!--/.content-->
</div>
<?php endif; ?>
<?php if($result->num_rows == 0): ?>
    <div class="span9">
        <div class="alert alert-info">
            <h3><center>No arrival customer for today!</center></h3>
        </div>
    </div>
<?php endif; ?>
    <!--/.span9-->

<?php include('include/footer.php'); ?>
<script>
    $('#table').DataTable();
</script>