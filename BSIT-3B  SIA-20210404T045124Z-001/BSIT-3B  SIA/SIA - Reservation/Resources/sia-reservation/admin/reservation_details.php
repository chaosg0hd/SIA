<?php 
    include('../conn.php');
    $id = $_POST['id'];
    $q = "SELECT 
tblroom.name, 
tblcustomer.fname, tblcustomer.lname, tblcustomer.contact, tblcustomer.address,
tblbilling.roomrate, tblbilling.num_night, tblbilling.num_pax
FROM tblreservation
LEFT JOIN tblcustomer on tblreservation.customerID=tblcustomer.id
LEFT JOIN tblroom on tblreservation.roomID=tblroom.id
LEFT JOIN tblbilling on tblreservation.id=tblbilling.reservationID
WHERE tblreservation.id=$id";
    $row = $con->query($q)->fetch_object();
?>
<div class="form-horizontal row-fluid">
    <div class="control-group">
        <label class="control-label">Room</label>
        <div class="controls">
            <input type="text" value="<?php echo $row->name;?>" class="span8" disabled>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Room Rate</label>
        <div class="controls">
            <input type="text" value="Php <?php echo $row->roomrate;?>" class="span8" disabled>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">No. of Night(s)</label>
        <div class="controls">
            <input type="text" value="<?php echo $row->num_night;?>" class="span8" disabled>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">No. of Pax</label>
        <div class="controls">
            <input type="text" value="<?php echo $row->num_pax;?>" class="span8" disabled>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Customer</label>
        <div class="controls">
            <?php $fullname = $row->fname.' '.$row->lname; ?>
            <input type="text" value="<?php echo $fullname;?>" class="span8" disabled>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Contact</label>
        <div class="controls">
            <input type="text" value="<?php echo $row->contact;?>" class="span8" disabled>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">Address</label>
        <div class="controls">
            <input type="text" value="<?php echo $row->address;?>" class="span8" disabled>
        </div>
    </div>
    
</div>