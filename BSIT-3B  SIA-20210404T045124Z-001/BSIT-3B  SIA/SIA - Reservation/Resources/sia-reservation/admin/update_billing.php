<?php
    $id = $_POST['id'];
    $_SESSION['id'] = $_POST['id'];;
    include('../conn.php');
    $process = isset($_POST['process']) ? $_POST['process']: null;
    if($process == null){
    $q = "SELECT 
        tblbilling.id, tblbilling.reservationID,tblbilling.num_pax,tblbilling.discount,
        tblreservation.roomID, tblreservation.dateFrom,tblreservation.dateTo
        FROM tblbilling
left JOIN tblreservation on tblbilling.reservationID=tblreservation.id
WHERE tblbilling.id=$id";
    $r = $con->query($q)->fetch_object();

    $rooms = $con->query("select * from tblroom where status=1");
?>
        <input type="hidden" value="<?php echo $r->id;?>" name="billingID" />
        <input type="hidden" value="<?php echo $r->reservationID;?>" name="reservationID" />
        <input type="hidden" value="<?php echo $r->dateFrom;?>" name="dateFrom" />
        <input type="hidden" value="<?php echo $r->roomID;?>" name="roomTMP" />
        <label>Change Room:</label>    
        <select name="roomID" class="form-control">
            <option value="0">Select Room...</option>
            <?php while($row = $rooms->fetch_object()): ?>
            <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
            <?php endwhile; ?>
        </select>
        <label>Date From:</label>
        <input type="text" value="<?php echo date('m/d/Y',strtotime($r->dateFrom));?>" class="form-control" disabled>
        <label>Date To:</label>
        <input type="date" value="<?php echo $r->dateTo;?>" class="form-control" name="dateTo">
        <label>No. of Pax: </label>
        <input type="text" value="<?php echo $r->num_pax;?>" name="num_pax" class="form-control" />
        

        <label>Discount: </label>
        <input type="hidden" value="<?php echo $r->id;?>" name="billingID" />
        <select name="discount" class="form-control">
            <option value="0" <?php if($r->discount=='0') echo 'selected';;?>>No Discount</option>
            <option value="10" <?php if($r->discount=='10') echo 'selected';;?>>Government Employee</option>
            <option value="20" <?php if($r->discount=='20') echo 'selected';;?>>Senior / Person with Disabilities</option>
        </select>
    <?php
    }else if($process=='payment'){
?>
        <div class="alert alert-success">
            <h3>Thank you for choosing our hotel!!!</h3>
        </div>
        <input type="hidden" value="<?php echo $id;?>" name="billingID" />
    <?php
    }else if($process=='addon'){ ?>
        <input type="hidden" value="<?php echo $id;?>" name="billingID" />
        <label>Name:</label>
        <input type="text" name="name" class="form-control" required>
        <label>Rate:</label>
        <input type="text" name="rate" class="form-control" required>
    <?php
    }else if($process=='checkout'){
        $q = mysqli_query($con,"select status,reservationID from tblbilling where status = 'Paid' and reservationID = '$id' ");
        if(mysqli_num_rows($q) > 0)
        {   echo $id;
            echo'<b>Are you sure you want to checkout?</b>';?>
            <input type="hidden" value="<?php echo $id;?>" name="billingID" />
            
     <?php   }
    }
    else if($process=='checkout1'){
        echo '
            <div class="alert alert-success">
                <h3>Please Paid before Checkout!</h3>
            </div>';
    }
    ?>
        
 